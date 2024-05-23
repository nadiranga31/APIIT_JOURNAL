<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function allPosts(){

        $posts =Post::where('user_id', Auth::user()->id)->get();
        // $posts =Post::all();

        return view('posts.all-post',['posts' => $posts]);

    }

    public function user_all_posts($id){

        // $posts =Post::all();
       // $posts = Post::where('user_id', Auth::id())->get();
        // $posts =Post::where('user_id', Auth::user()->id)->get();

        $user = User::findOrFail($id);
        $posts = Post::where('user_id', $id)->get();
        return view('posts.userall-posts' ,compact('user', 'posts'));


    }


      public function show_post(){

        $posts =Post::all();
        // $posts =Post::where('user_id', Auth::user()->id)->get();
        return view('admin.admin.show_post' , ['posts' => $posts]);


    }



}
