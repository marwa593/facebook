<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['web']] ,function() {

    Route::group(['namespace' => '\App\Http\Controllers'], function(){



    Route::get('/', function () {
         return view('welcome');
    })->name('home');


    Route::post('/signup', [

        'uses'=>'UserController@postsignup',
        'as'=>'signup'
    ]);


    Route::post('/signin', [

        'uses'=>'UserController@postsignin',
        'as'=>'signin'
    ]);



    Route::get('/account', [

        'uses'=>'UserController@getaccount',
        'as'=>'account'
    ]);


    Route::post('/updateaccount', [

        'uses'=>'UserController@postsaveaccount',
        'as'=>'account.save'
    ]);

    Route::get('/userimage/{filename}', [

        'uses'=>'UserController@getuserimage',
        'as'=>'account.image'
    ]);




    Route::get('/dashboard', [

        'uses'=>'PostController@getdashboard',
        'as'=>'dashboard',
        'middleware'=>'auth'
    ]);

    Route::get('/createPost', [

        'uses'=>'PostController@postcreatePost',
        'as'=>'post.create',
        'middleware'=>'auth'

    ]);

    Route::get('/post-delete/{post_id}', [

        'uses'=>'PostController@getdeletepost',
        'as'=>'post.delete',
        'middleware'=>'auth'
    ]);


    Route::get('/logout', [

        'uses'=>'UserController@getlogout',
        'as'=>'logout',

    ]);

    Route::post('/edit',[

        'uses'=>'PostController@postEditpost',
        'as'=>'edit',

    ]);

    Route::get('/addfriend/{id}',[
        'uses' => 'UserController@addfriend',
        'as' => 'add.friend'
    ] );

    Route::get('/deletefriend/{id}',[
        'uses' => 'UserController@deletefriend',
        'as' => 'del.friend'
    ] );


    Route::post('/comment/{post_id}', [
        'uses' => 'CommentController@postComment',
        'as' => 'add.comment'
        //'middleware'=>'auth'
    ]);












});
});


//Route::get('/login', [ussercontroller::postsignup, 'login']);


/*
Route::post('/signup', [
    'uses' => 'ussercontroller@postsignup',
    'as' => 'signup'
]);



*/
