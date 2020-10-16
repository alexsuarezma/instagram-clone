<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Image;
use App\Models\User;
use App\Models\Follow;

class HomeController extends Controller
{
    public function index() {
        // SACAME TODAS LAS PUBLICACIONES DE LOS USUARIO QUE SIGO
        // select * from images where user_id in (select user_id_followed from follows where user_id_follower = 6) OR user_id = 6;
        // $images = Image::orderBy('id','desc')->paginate(5);
        $images = Image::whereIn('user_id', Follow::select('user_id_followed')
        ->where('user_id_follower', '=', \Auth::user()->id))
        ->orWhere('user_id', '=', \Auth::user()->id)
        ->orderBy('created_at','desc')
        ->paginate(5);
        
        // SACAME A TODOS LOS USUARIO QUE NO ESTOY SIGUIENDO PARA SUGERENCIA
        // select * from users where id not in (select user_id_followed from follows where user_id_follower = 6);
        $users = User::whereNotIn('id', Follow::select('user_id_followed')
        ->where('user_id_follower', '=', \Auth::user()->id))
        ->limit(4)
        ->get();

        return view('dashboard',[
            'images' => $images,
            'users' => $users
        ]);
    }
}

