<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostControllerApi as ApiPostController;

//  AUTH & TEST ROUTES 
Route::prefix('test')->group(function () {
    // Authenticated user info (Sanctum/JWT, for testing auth)
    // GET /api/test/user
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    // Hello World/test route
    // GET /api/test/GreetingApi
    Route::get('/GreetingApi', function () {
        return ['name' => 'Greeting Api'];
    });
});


//  POSTS ROUTES 
Route::prefix('posts')->group(function () {
    // List all posts
    // GET /api/posts
    Route::get('/', [ApiPostController::class, 'index']);

    // find posts by keyword in their title
    // GET /api/posts/find?query=keyword
    Route::get('/find', [ApiPostController::class, 'findPosts']);
    
    // Get the author/user data for a specific post
    // GET /api/posts/{id}/author
    Route::get('/{id}/author', [ApiPostController::class, 'postAuthor']);
    // Get one post by ID
    // GET /api/posts/{id}
    Route::get('/{id}', [ApiPostController::class, 'show']);

    // Create a new post
    // POST /api/posts
    Route::post('/', [ApiPostController::class, 'store']);

    // Update an existing post
    // PUT /api/posts/{id}
    Route::put('/{id}', [ApiPostController::class, 'update']);

    // Delete a post
    // DELETE /api/posts/{id}
    Route::delete('/{id}', [ApiPostController::class, 'destroy']);
    
});

//  USERS ROUTES 
Route::prefix('users')->group(function () {
    // Get all posts that belong to a specific user
    // GET /api/users/{id}/posts
    Route::get('/{id}/posts', [ApiPostController::class, 'userPosts']);

    // List the 10 most recently registered users
    // GET /api/users/recent
    Route::get('/recent', [ApiPostController::class, 'recentUsers']);

    // Get simple stats (like post count) for a user
    // GET /api/users/{id}/stats
    Route::get('/{id}/stats', [ApiPostController::class, 'userStats']);
});

// ================= COMMENTS ROUTES =================
// If/when implementation comments API logic, group here:
# Route::prefix('comments')->group(function () {
#     // Add a comment to a post
#     // POST /api/comments
#     Route::post('/', [ApiPostController::class,'postComments']); 
# });

?>
