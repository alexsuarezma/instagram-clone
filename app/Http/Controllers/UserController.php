<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use  App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function config(){
        return view('user.config');
    }
    
    public function update(Request $request){
        
        $user = \Auth::user();
        $id = \Auth::user()->id;
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick'  => 'required|string|max:100|unique:users,nick,'.$id,
            'email'  => 'required|string|email|max:255|unique:users,email,'.$id,
            ]);
            
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');
        
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;
        
        // UPLOAD IMAGES
        $profile_photo_path = $request->file('profile_photo_path');
        if($profile_photo_path){
            $image_path = time().$profile_photo_path->getClientOriginalName();
            Storage::disk('users')->put( $image_path, File::get($profile_photo_path) );

            $user->profile_photo_path = $image_path;
        }
        
        $user->update();

        return redirect()->route('config')->with([
            'message' => 'Usuario actualizado correctamente',
        ]);
    }

    public function changePassword(Request $request){
        
        $user = \Auth::user();
        
        $validatedData = $request->validate([
            'current_password' => 'required|max:255|password',
            'password' => 'required|max:255|min:8|confirmed',
            'password_confirmation'  => 'required|max:255|same:password'
        ]);

        $password = Hash::make($request->input('password'));
        
        $user->password = $password;

        $user->update();

        return redirect()->route('config.updatePassword')->with([
            'message' => 'Contraseña actualizada correctamente',
        ]);
    }

    public function configPassword(){
        return view('user.update-password');
    }

    public function getImage($fileid){
        $user = User::where('id', $fileid)->first();

        $file = Storage::disk('users')->get($user->profile_photo_path);
        return new Response($file,200);
    }

    public function profile($id){
        $user = User::find($id);

        return view('user.profile',[
            'user' => $user
        ]);
    }

    public function autocomplete(Request $request){

        if($request->get('query')){
            $query = $request->get('query');
            $users = User::where('name', 'LIKE', "%{$query}%")->orWhere('nick', 'LIKE', "%{$query}%")->orWhere('surname', 'LIKE', "%{$query}%")->get();

            return view('user.autocomplete',[
                'users' => $users
            ]);
        }
    }

}
