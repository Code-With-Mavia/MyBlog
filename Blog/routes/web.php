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
        Route::get('user', 'getUser');
        Route::get('userInfo', 'getUserInfo');
        Route::get('userName','getUserName');
        
    }
);
Route::controller(PostController::class) -> group
(function()
    {
        Route::get('get','getPost');
        Route::post('add','addNewPost');
        Route::put('update','updatePost');
        Route::patch('delete','deletePost');
    }
)

?>