<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }


    public function list(){
        return view('admin.admin.list');
    }

    // public function show_post(){

    //     $post =Post::all();
    //     //  $post = Post::findOrFail($postId);
    //     return view('admin.admin.show_post' , compact('post'));


    // }


    public function accept_post($id){
        $post = Post::find($id);
        $post->post_status = 'active';

        $post->save();

        return redirect()->back()->with('status','Post Status changed to Active');

    }

    public function reject_post($id){
        $post = Post::find($id);
        $post->post_status = 'rejected';

        $post->save();

        return redirect()->back()->with('status','Post Status changed to Rejected');

    }

    public function dashboard()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.dashboard')->with('status', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('status', 'User deleted successfully!');
    }

}
