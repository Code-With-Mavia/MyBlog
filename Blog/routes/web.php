<?php

use Illuminate\Support\Facades\Route;
// use Laravel_core\MyBlog\Blog\App\Http\Controllers\UserController;
use Laravel_core\MyBlog\Blog\App\Http\Controllers\PostController;
use Laravel_core\MyBlog\Blog\App\Http\Controllers\AuthController;

// Redirect landing page '/' to login
Route::get('/', function () {
    return redirect('/login');
});

// User (admin) routes
// Route::controller(UserController::class)->group(function () {
//     Route::get('user', 'getUser');
//     Route::get('userInfo', 'getUserInfo');
//     // Route::get('userName','getUserName');
// });

// Auth view routes, no protection (everyone can see login/register)
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

// Auth processing
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

// Post routes: these are protected by session!
Route::middleware(['user_session'])->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'showCreateForm'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'addNewPost'])->name('posts.add');
    Route::get('/posts/{id}/edit', [PostController::class, 'showEditForm'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'updatePost'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'deletePost'])->name('posts.delete');
});

?>
