<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SavedPostController;

route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/', [WelcomeController::class,'index'])->name('home');

Route::get('/search', [WelcomeController::class,'search'])->name('search');


//blog page
Route::get('/blog', [PostController::class,'index'])->name('posts.index');

Route::get('/blog/{postId}', [PostController::class,'show'])->name('posts.show');



Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/all',  [HomeController::class,'allPosts'])->name('posts.all');
Route::get('/posts/{postId}/edit', [PostController::class,'edit'])->name('posts.edit');
Route::post('/posts/{postId}/update', [PostController::class,'update'])->name('posts.update');
Route::get('/posts/{postId}/delete', [PostController::class,'delete'])->name('posts.delete');

Route::get('/allpost/user/{id}',  [HomeController::class,'user_all_posts'])->name('posts.userall-posts');





Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
     Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//Admin routes

//  Route::get('admin/dashboard',function () {return view('admin.dashboard');} );
// Route::get('admin/admin/list',function () { return view('admin.admin.list');} );

// Route::prefix('admin')->middleware(['auth'])->group(function () {

//    Route::get('/admin/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');

// });


Route::group(['middleware'=> 'auth','isAdmin'],function () {

    Route::get('/admin/dashboard', [DashboardController::class,'index']);
    Route::get('admin/admin/list', [DashboardController::class,'list'])->name('admin.admin.list');
    Route::get('admin/admin/show_post',  [HomeController::class,'show_post'])->name('admin.admin.show_post');


});

Route::get('admin', [AuthController::class,'login_admin']);
Route::post('admin', [AuthController::class,'auth_login_admin']);
Route::get('admin/logout', [AuthController::class,'logout_admin']);

Route::get('/accept_post/{id}', [DashboardController::class,'accept_post']);
Route::get('/reject_post/{id}', [DashboardController::class,'reject_post']);


Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

// Route to edit user
Route::get('/admin/users/{id}/edit', [DashboardController::class, 'edit'])->name('users.edit');

// Route to update user
Route::put('/admin/users/{id}', [DashboardController::class, 'update'])->name('users.update');

// Route to delete user
Route::delete('/admin/users/{id}', [DashboardController::class, 'destroy'])->name('users.destroy');




Route::middleware('auth')->group(function () {
    Route::post('/posts/{post}/save', [SavedPostController::class, 'savePost'])->name('posts.save');
    Route::post('/posts/{post}/unsave', [SavedPostController::class, 'unsavePost'])->name('posts.unsave');
    Route::get('/saved-posts', [SavedPostController::class, 'getSavedPosts'])->name('saved-posts.index');
});
