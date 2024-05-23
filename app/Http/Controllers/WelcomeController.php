<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index(){

        //  $posts = Post::all();

        $posts = Post::where('post_status','=','active')->get();
        return view("home", ['posts' => $posts]);

    }

    public function search(Request $request){

        $search= $request->input('search');

        $posts=Post::query()
        ->where('title','LIKE','%'.$search.'%')
        ->orWhere('slug','LIKE','%'.$search.'%')
        ->orWhere('name','LIKE','%'.$search.'%')
        ->orWhere('description','LIKE','%'.$search.'%')
        ->get();

        return view('home', compact('posts','search'));
    }

}
