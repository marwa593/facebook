<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    
    

    public function postsignup(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|unique:users',
            'first_name'=>'required|max:20',
            'password'=>'required|min:3',

        ]);

        $email=$request['email'];
        $first_name=$request['first_name'];
        $password=bcrypt($request['password']);
        

        $user=new User();
        $user->email=$email;
        $user->name=$first_name;
        $user->password=$password;
       
       

        $user->save();
        return redirect()->route('dashboard');
  

    }


    public function postsignin(Request $request)
    {

        $this->validate($request,[
            'email'=>'required|email',
            
            'password'=>'required|min:3',

        ]);

        if(Auth::attempt(['email' => $request['email'],'password' => $request['password'] ]) )
        {
            return redirect()->route('dashboard');
        }
        return redirect()->back();

    }


    public function getlogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }


    
    public function getaccount()
    {

        return view('account',['user' =>Auth::user() ]);
    }


    public function postsaveaccount(Request $request)
    {

        $this->validate($request,[
            'first_name'=>'required|max:50',
        ]);
        $user=Auth::user();
        $user->name=$request['first_name'];
        $user::update();
        $file=$request->file('image');
        $filename=$request['first_name'] . '-' . $user->id . '.jpg' ;
        if($file)
        {
            Storage::disk('local')->put($filename ,File::get($file));
        }

        return redirect()->route('account');

    }

    public function getuserimage($filename)
    {
        $file=Storage::disk('local')->get($filename);
        return new Response($file, 200);

    }





}
