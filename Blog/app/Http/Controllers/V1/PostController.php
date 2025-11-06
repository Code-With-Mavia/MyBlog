<?php

namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\V1\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $userId = session('user_id');
        $posts = Post::where('user_id', $userId)->get();
        return view('posts.index', compact('posts'));
    }

    public function showCreateForm()
    {
        return view('posts.create');
    }

    public function addNewPost(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
            'comments' => 'required|string',
        ]);
        $userId = session('user_id');
        Post::create([
            'user_id'    => $userId,
            'title'      => $data['title'],
            'body'       => $data['body'],
            'comments'   => $data['comments'],
        ]);
        return redirect()->route('posts.index');
    }

    public function showEditForm($id)
    {
        $userId = session('user_id');
        $post = Post::where('id', $id)->where('user_id', $userId)->first();
        abort_if(!$post, 404);
        return view('posts.edit', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);
        $userId = session('user_id');
        $post = Post::where('id', $id)->where('user_id', $userId)->first();
        abort_if(!$post, 404);
        $post->update($data);
        return redirect()->route('posts.index');
    }

    public function deletePost($id)
    {
        $userId = session('user_id');
        $post = Post::where('id', $id)->where('user_id', $userId)->first();
        abort_if(!$post, 404);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function listPosts()
    {
        return Post::all()->latest()->paginate(10);
    }
}
?>