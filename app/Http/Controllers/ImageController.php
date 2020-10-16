<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function create(){
        return view('image.create');
    }

    public function save(Request $request){
        $validatedData = $request->validate([
            'description' => 'required',
            'image_path' => 'required|image',
        ]);
 
        $description = $request->input('description');
        $image_path = $request->file('image_path');

        $userId = \Auth::user()->id;
        $image = new Image();

        $image->description = $description;
        $image->user_id = $userId;

        if($image_path){
            
            // UPLOAD IMAGES
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put( $image_path_name, File::get($image_path) );

            $image->image_path = $image_path_name;
        }

        $image->save();

        return redirect()->route('dashboard')->with([
            'message' => 'La foto ha sido publicada',
        ]);
    }

    public function getImage($fileid){
        $image = Image::where('id', $fileid)->first();

        $file = Storage::disk('images')->get($image->image_path);
        return new Response($file,200);
    }

    public function details($id){
        $image = Image::find($id);

        return view('image.detail',[
            'image' => $image,
        ]);
    }

    public function publicDetail($id){
        $image = Image::find($id);

        return view('image.publication',[
            'image' => $image,
        ]);
    }

    public function getRandomImage() {
        $images = Image::orderBy('id','desc')->paginate(12);

        return view('image.explore',[
            'images' => $images,
        ]);
    }
}
