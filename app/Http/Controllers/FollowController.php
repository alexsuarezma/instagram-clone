<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
class FollowController extends Controller
{
    public function follow($followedId){
        // BUSCAR SI EL SIGUE ESTA CUENTA
        $issetFollow = Follow::where('user_id_follower',\Auth::user()->id)->where('user_id_followed', $followedId)->count();

        if($issetFollow == 0){
            
            $follow = new Follow();
            $follow->user_id_follower = \Auth::user()->id;
            $follow->user_id_followed = $followedId;
    
            $follow->save();
    
            return \response()->json([
                'follow' => $follow
            ]);
        }else{  
            //EL USUARIO YA SIGUE LA CUENTA
            return \response()->json([
                'message' => 'El usuario ya sigue esta cuenta'
            ]);
        }


    }

    public function followProfile($followedId){
        // BUSCAR SI EL SIGUE ESTA CUENTA
        $issetFollow = Follow::where('user_id_follower',\Auth::user()->id)->where('user_id_followed', $followedId)->count();

        if($issetFollow == 0){
            
            $follow = new Follow();
            $follow->user_id_follower = \Auth::user()->id;
            $follow->user_id_followed = $followedId;
    
            $follow->save();

        }
        return redirect('profile/'.$followedId);

    }

    public function disfollow($followedId){
        $follow = Follow::where('user_id_follower',\Auth::user()->id)->where('user_id_followed', $followedId)->first();

        if( $follow ){
            
            $follow->delete();
    
            return \response()->json([
                'follow' => $follow,
                'message' => 'Has dado disfollow'
            ]);
        }else{
            //NO EXISTE EL FOLLOW
            return \response()->json([
                'message' => 'El follow no existe'
            ]);
        }
    }

    public function disfollowProfile($followedId){
        $follow = Follow::where('user_id_follower',\Auth::user()->id)->where('user_id_followed', $followedId)->first();

        if( $follow ){
            $follow->delete();
        }
        
        return redirect('profile/'.$followedId);
    }
}
