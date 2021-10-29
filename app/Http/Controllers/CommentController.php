<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{

    public function postComment(Request $request)
     {

        $comment = new Comment();
        // $post = new Post();
        // $post_id = $request->post_id;
        $this->validate($request ,[
            'Commbody'=>'required |max:1000'
        ]);

        $post = Post::find($request['post_id']);
        $comment->body = $request['Commbody'];
        //$comment->post_id = $request['post_id'];
        $message='there is an error';
        // if ($request->post()) {
        //    echo "yes";
        //    dd($request->post());
        // }
        // else {
        //     echo "no";
        // }
        // if($request->post()->comments()->save($comment))
        // {
        //     $message='comment created!';
        // }
        return redirect()->route('dashboard')->with(['message' =>$message ]);
            // $comment = new Comment();
            // $post = new Post();
            // $comment->body = $request->commbody;
            // $comment->post()->associate($request->user());
            // $post = post::find($request->post_id);
            // $post->comments()->save($comment);
            // return redirect()->route('dashboard')->with(['message' =>$message ]);
     }

}
