<?php

namespace Laravel_core\MyBlog\Blog\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController 
{
    public function index()
    {
        $userId = session('user_id');
        $posts = DB::table('posts')->where('user_id', $userId)->get();
        return view('posts.index', compact('posts'));
    }

    public function showCreateForm()
    {
        return view('posts.create');
    }

    public function addNewPost(Request $request)
    {
        $request->validate(
 [
            'title'   => 'required|string|max:255',
            'body'    => 'required|string',
        ]);

        $userId = session('user_id');
        DB::table('posts')->insert(
[
            'user_id'    => $userId,
            'title'      => $request->input('title'),
            'body'       => $request->input('body'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('posts.index');
    }

    public function showEditForm($id)
    {
        $userId = session('user_id');
        $post = DB::table('posts')->where('id', $id)->where('user_id', $userId)->first();
        abort_if(!$post, 404);
        return view('posts.edit', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        $userId = session('user_id');
        $updated = DB::table('posts')
            ->where('id', $id)
            ->where('user_id', $userId)
            ->update(
    [
                'title'      => $request->input('title'),
                'body'       => $request->input('body'),
                'updated_at' => now(),
            ]);

        abort_if(!$updated, 404);
        return redirect()->route('posts.index');
    }

    public function deletePost($id)
    {
        $userId = session('user_id');
        $deleted = DB::table('posts')->where('id', $id)->where('user_id', $userId)->delete();
        abort_if(!$deleted, 404);
        return redirect()->route('posts.index');
    }

    public function listPosts()
    {
        $posts = DB::table('posts')->get();
        return $posts;
    }
}
