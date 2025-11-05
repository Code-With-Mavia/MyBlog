<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\V1\Models\Post;
use App\Http\Controllers\V1\Models\User;

class PostControllerApi extends Controller
{
    public function test()
    {
        return response()->json(['ok']);
    }

    // GET /api/posts
    public function index()
    {
        try 
        {
            $posts = Post::all();
            return response()->json($posts);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }

    // GET /api/posts/{id}
    public function show($id)
    {
        try 
        {
            $post = Post::find($id);
            if (!$post) 
            {
                return response()->json(['error' => 'Post not found'], 404);
            }
            return response()->json($post);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // POST /api/posts
    public function store(Request $request)
    {
        try 
        {
            $data = $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'title' => 'required|string|max:255',
                'body'  => 'required|string',
                'comments' => 'required|string',
            ]);
            $post = Post::create($data);
            return response()->json($post, 201);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }

    // PUT /api/posts/{id}
    public function update(Request $request, $id)
    {
        try 
        {
            $post = Post::find($id);
            if (!$post) 
            {
                return response()->json(['error' => 'Post not found'], 404);
            }
            $data = $request->validate([
                'title' => 'string|max:255',
                'body'  => 'string',
                'comments' => 'required|string',
            ]);
            $post->update($data);
            return response()->json($post, 200);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }

    // POST /api/comments/{id}
    public function postComments(Request $request, $id)
    {
        try 
        {
            $post = Post::find($id);
            if (!$post) {
                return response()->json(['error' => 'Post not found'], 404);
            }
            $data = $request->validate([
                'comments' => 'required|string',
            ]);
            $post->comments = $data['comments'];
            $post->save();
            return response()->json($post, 200);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }

    // GET /api/posts/comments
    public function listComments()
    {
        try 
        {
            $posts = Post::all(['id','user_id','title','body','comments','created_at','updated_at']);
            return response()->json($posts);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }

    // DELETE /api/posts/{id}
    public function destroy($id)
    {
        try {
            $post = Post::find($id);
            if (!$post) {
                return response()->json(['error' => 'Not found'], 404);
            }
            $post->delete();
            return response()->json(['message' => 'Deleted']);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }

    // GET /api/users/{id}/posts
    public function userPosts($id)
    {
        try 
        {
            $user = User::find($id);
            if (!$user) 
            {
                return response()->json(['error' => 'User not found'], 404);
            }
            return response()->json($user->posts);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }

    // GET /api/posts/{id}/author
    public function postAuthor($id)
    {
        try {
            $post = Post::find($id);
            if (!$post) 
            {
                return response()->json(['error' => 'Post not found'], 404);
            }
            $user = $post->user;
            return $user ? response()->json($user) : response()->json(['error'=>'User not found'], 404);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }

    // GET /api/users/recent
    public function recentUsers()
    {
        try 
        {
            $users = User::latest()->limit(10)->get();
            return response()->json($users);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }

    // GET /api/posts/find?query=keyword
    public function findPosts(Request $request)
    {
        try 
        {
            $query = $request->query('query');
            if (empty($query)) 
            {
                return response()->json([]);
            }
            $posts = Post::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($query) . '%'])->get();
            return response()->json($posts);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }

    // GET /api/users/{id}/stats
    public function userStats($id)
    {
        try 
        {
            $user = User::find($id);
            if (!$user) return response()->json(['error'=>'User not found'], 404);
            $count = $user->posts()->count();
            return response()->json([
                'name' => $user->name,
                'email' => $user->email,
                'posts_count' => $count,
                'registered_at' => $user->created_at
            ]);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }
}
?>