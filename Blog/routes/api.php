<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel_core\MyBlog\Blog\App\Http\Controllers\PostController;
use Laravel_core\MyBlog\Blog\App\Http\Controllers\AuthController;

/** Example: Authenticated user route, if using sanctum */
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/** Example: Test route */
Route::get('/GreetingApi', function () {
    return ['name' => 'Greeting Api'];
});
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/posts', [PostController::class, 'listPosts']); // GET: all posts
?>