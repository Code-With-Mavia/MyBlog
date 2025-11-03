<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', function () 
{
    return view('welcome');
});

Route::controller(UserController::class) -> group
(function () 
    {
        // user routes 
        Route::get('user', 'getUser'); // shows all users
        Route::get('userInfo', 'getUserInfo'); // shows all users
        // Route::get('userName','getUserName'); // shows all users with name only 
        
    }
);
Route::controller(PostController::class)->group(function () 
    {
        Route::get('posts', 'index') -> name('posts.index');
        Route::get('posts/create', 'showCreateForm') -> name('posts.create');
        Route::post('posts', 'addNewPost') -> name('posts.add');
        Route::get('posts/{id}/edit', 'showEditForm') -> name('posts.edit');
        Route::put('posts/{id}', 'updatePost') -> name('posts.update');
        Route::delete('posts/{id}', 'deletePost') -> name('posts.delete');
    }
);



?>