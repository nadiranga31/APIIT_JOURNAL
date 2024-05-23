<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedPostController extends Controller
{
    public function savePost(Post $post)
    {
        $user = Auth::user();
        if ($user) {
            $user->savedPosts()->attach($post->id);
            return response()->json(['status' => 'Post saved']);
        }
        return response()->json(['status' => 'Unauthorized'], 401);
    }

    public function unsavePost(Post $post)
    {
        $user = Auth::user();
        if ($user) {
            $user->savedPosts()->detach($post->id);
            return response()->json(['status' => 'Post unsaved']);
        }
        return response()->json(['status' => 'Unauthorized'], 401);
    }

    public function getSavedPosts()
    {
        $user = Auth::user();
        if ($user) {
            $savedPosts = $user->savedPosts()->get();
            return view('saved_posts.index', compact('savedPosts'));
        }
        return redirect()->route('login');
    }
}
