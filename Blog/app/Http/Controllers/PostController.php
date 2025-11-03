<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // List all posts
    public function index()
    {
        $posts = DB::table('posts') -> get();
        return view('posts.index', compact('posts'));
    }

    // Show the create post form
    public function showCreateForm()
    {
        // Needs a blade file: posts/create.blade.php
        return view('posts.create');
    }

    // Add new post
    public function addNewPost(Request $request)
    {
        $request ->  validate
        (
    [
                'user_id' => 'required|exists:users,id',
                'title'   => 'required|string|max:255',
                'body'    => 'required|string',
            ]
        );

        DB::table('posts') ->  insert
        (
    [
                'user_id'    => $request -> input('user_id'),
                'title'      => $request -> input('title'),
                'body'       => $request -> input('body'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        // Redirect to post list on success
        return redirect() -> route('posts.index');
    }

    // Show edit form for post
    public function showEditForm($id)
    {
        $post = DB::table('posts') -> where('id', $id) ->  first();
        return view('posts.edit', compact('post'));
    }

    // Update an existing post
    public function updatePost(Request $request, $id)
    {
        $request -> validate(
[
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        DB::table('posts')
             ->  where('id', $id)
             ->  update(
    [
                'title'      => $request ->  input('title'),
                'body'       => $request ->  input('body'),
                'updated_at' => now(),
            ]);

        // Redirect to post list after update
        return redirect() -> route('posts.index');
    }

    // Delete a post
    public function deletePost($id)
    {
        DB::table('posts') -> where('id', $id) ->  delete();
        return redirect() -> route('posts.index');
    }
}
?>