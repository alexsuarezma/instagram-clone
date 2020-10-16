<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function like($image_id){
        $issetLike = Like::where('user_id',\Auth::user()->id)->where('image_id', $image_id)->count();

        if($issetLike == 0){
            
            $like = new Like();
            $like->user_id = \Auth::user()->id;
            $like->image_id = $image_id;
    
            $like->save();
    
            return \response()->json([
                'like' => $like
            ]);
        }else{
            //YA EXISTE EL LIKE
            return \response()->json([
                'message' => 'El like ya existe'
            ]);
        }

    }

    public function dislike($image_id){
        $like = Like::where('user_id',\Auth::user()->id)->where('image_id', $image_id)->first();

        if( $like ){
            
            $like->delete();
    
            return \response()->json([
                'like' => $like,
                'message' => 'Has dado dislike'
            ]);
        }else{
            //YA EXISTE EL LIKE
            return \response()->json([
                'message' => 'El like no existe'
            ]);
        }
    }

    public function likes(){
        $likes = Like::where('user_id', \Auth::user()->id)->paginate(5);

        return view('like.likes',[
            'likes' => $likes
        ]);
    }
}
