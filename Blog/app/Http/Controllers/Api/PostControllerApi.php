<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostControllerApi extends Controller
{
    // GET /api/posts
    // List all posts
    public function index()
    {
        $posts = DB::table('posts')->get();
        return response()->json($posts);
    }

    // GET /api/posts/{id}
    // Get a single post by its ID
    public function show($id)
    {
        $post = DB::table('posts')->find($id);
        if (!$post) {
            return response()->json(['error' => 'Not found'], 404);
        }
        return response()->json($post);
    }

    // POST /api/posts
    // Create a new post
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);
        $data['created_at'] = now();
        $data['updated_at'] = now();

        $id = DB::table('posts')->insertGetId($data);
        return response()->json(['id' => $id], 201);
    }

    // PUT /api/posts/{id}
    // Update an existing post
    public function update(Request $request, $id)
    {
        $post = DB::table('posts')->find($id);
        if (!$post) {
            return response()->json(['error' => 'Not found'], 404);
        }

        $data = $request->validate([
            'title' => 'string|max:255',
            'body'  => 'string',
        ]);
        $data['updated_at'] = now();

        DB::table('posts')->where('id', $id)->update($data);
        return response()->json(['message' => 'Updated']);
    }

    // DELETE /api/posts/{id}
    // Delete a post
    public function destroy($id)
    {
        $deleted = DB::table('posts')->where('id', $id)->delete();
        if (!$deleted) {
            return response()->json(['error' => 'Not found'], 404);
        }
        return response()->json(['message' => 'Deleted']);
    }

    

    // GET /api/users/{id}/posts
    // Get all posts belonging to a specific user
    public function userPosts($id)
    {
        $posts = DB::table('posts')->where('user_id', $id)->get();
        return response()->json($posts);
    }

    // GET /api/posts/{id}/author
    // Get the author data for a specific post
    public function postAuthor($id)
    {
        $post = DB::table('posts')->find($id);
        if (!$post) return response()->json(['error' => 'Post not found'], 404);
        $user = DB::table('users')->find($post->user_id);
        return $user ? response()->json($user) : response()->json(['error'=>'User not found'], 404);
    }

    // GET /api/users/recent
    // Get the 10 most recently registered users
    public function recentUsers()
    {
        $users = DB::table('users')->orderBy('created_at', 'desc')->limit(10)->get();
        return response()->json($users);
    }

    // GET /api/posts/search?query=keyword
    // Search posts by title containing a keyword
    public function searchPosts(Request $request)
    {
        $query = $request->query('query');
        $posts = DB::table('posts')
            ->where('title', 'LIKE', "%{$query}%")
            ->get();
        return response()->json($posts);
    }

    // GET /api/users/{id}/stats
    // Get simple stats for a user (name, email, post count, registration date)
    public function userStats($id)
    {
        $user = DB::table('users')->find($id);
        if (!$user) return response()->json(['error'=>'User not found'], 404);
        $count = DB::table('posts')->where('user_id', $id)->count();
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'posts_count' => $count,
            'registered_at' => $user->created_at
        ]);
    }

}
?>
