<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function index()
    {
        return view(
            'posts.index',
    [
        'posts'=>Post::take(5)->get()
    ]);
    }





    public function store(Request $request){

        $validater = Validator::make($request->all(), [
            'title'=> "required",
            'description'=> "required",
            'image'=> "required|image"

        ]);

        if($validater->fails()){
            return back()->with('status','Something Went Wrong!');
        }else{
             $imageName = time().".".$request->image->extension();

             $request->image->move(public_path('images'), $imageName);
            Post::create(
                [
                    'user_id'=>auth()->user()->id,
                    'name'=>auth()->user()->name,
                    'usertype'=>auth()->user()->usertype,
                    'post_status' => 'pending',

                    'title' => $request->title,
                    'description'=> $request->description,
                    'slug'=> $request->slug,
                    'date'=> $request->date,
                     'image'=> $imageName

                    ]
                );

        }

        return redirect(route('posts.all'))->with('status','You have Added the Blog Post Successfully!');
    }

    public function show($postId){

        $post = Post::findOrFail($postId);
        $userName = $post->user->name;
        return view('posts.show', compact('post','userName'));

    }

    // public function show_post($postId){

    //     // $post =Post::all();
    //      $post = Post::findOrFail($postId);
    //     return view('admin.admin.show_post' , compact('post'));


    // }

    public function edit($postId){
        $post = Post::findOrFail($postId);
        return view('posts.edit',compact('post'));
    }




    // public function update($postId , Request $request){

    //     // dd($request->all());
    //     Post::findOrFail($postId)->update($request->all()) ;

    //     $image=$request->image;
    //     if($image)
    //     {
    //         $imageName = time().'.'.$image->getClientOriginalExtension();
    //         $request->image->move(public_path('images'), $imageName);
    //         $data->image = $imageName;



    //     }
    //     $data->save();

    //     return redirect(route('posts.all'))->with('status','Post Updated');
    // }


    public function update($postId, Request $request)
{
    // Validate the request if necessary
    // $request->validate([
    //     'title' => 'required|string|max:255',
    //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     // Add other validation rules as needed
    // ]);

    // Find the post
    $data = Post::findOrFail($postId);

    // Update the post data
    $data->update($request->except('image'));

    // Handle the image upload if a new image is provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $data->image = $imageName;
    }

    // Save the updated post
    $data->save();

    // Redirect with a success message
    return redirect()->route('posts.all')->with('status', 'Post Updated');
}


    public function delete($postId){
        Post::findOrFail($postId)->delete();
        return redirect(route('posts.all'))->with('status','Post Deleted !!');;
    }


}
