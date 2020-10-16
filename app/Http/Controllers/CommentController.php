<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function save(Request $request){
        $comment = new Comment();
        
        $comment->user_id = \Auth::user()->id;

        $content = $request->get('comment');
        $comment->content = $content;
        
        $image_id = $request->get('image_id');
        $comment->image_id = $image_id;

        if($comment->save()){
            $newComment = Comment::where('id', $comment->id)->first();
            
            if($request->get('type_comment') == 'publication'){
                return view('image.comments-publication',[
                    'comment' => $newComment
                ]);
            }
            if($request->get('type_comment') == 'home'){
                return view('image.comments-home',[
                    'comment' => $newComment
                ]);
            }
        }
        
    }

    public function delete($id){
        $user = \Auth::user();

        $comment = Comment::find($id);

        if($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)){            
            $comment->delete();
            
            return \response()->json([
                'comment' => $comment,
                'message' => 'Has eliminado el comentario'
            ]);
        }else{
            // EL COMENTARIO NO EXISTE
            return \response()->json([
                'message' => 'El comentario no existe'
            ]);
        }
    }
}
