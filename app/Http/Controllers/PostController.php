<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function getdashboard()
    {
        $posts=post::orderby('created_at','desc')->get();
        $comments=comment::orderby('created_at','desc')->get();
        return view('dashboard',['posts' =>$posts],['comments'=>$comments]);
    }


    public function postcreatePost(Request $request)
    {

        $post = new Post();

        $this->validate($request ,[
            'body'=>'required |max:1000'
        ]);

        $post->body = $request['body'];
        $message='there is an error';

        // if($request->user()){
        //     dd($request->user());
        // }

       if($request->user()->posts()->save($post))
       {
        $message='post created!';
       }
        return redirect()->route('dashboard')->with(['message' =>$message ]);
    }
     public function getdeletepost($post_id)
     {

        $post=Post::where('id',$post_id)->first();

        if(Auth::user() != $post->user)
        {
            return redirect()->back();

        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' =>'Successfully Deleted' ]);
     }


     public function postEditpost(Request $request)
     {

        $this->validate($request ,[
            'body'=>'required |max:1000'
        ]);
        $post=Post::find($request['postId']);
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body'=>$post->body],200);

        return redirect()->route('dashboard');


     }



}
