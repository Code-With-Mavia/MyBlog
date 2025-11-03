<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    function getPost()
    {
        $post = DB::table("posts") -> get();
        return $post;
    }

    // add new post 
    function addNewPost()
    {
        $post = DB::table('posts') -> select( "INSERT INTO posts (id,user_id,title,body,created_at,updated_at) VALUES (? ,? ,? ,? ,timestamp, timestamp )") -> get();
        return $post;
    }
    // update the existing post 
    function updatePost()
    {
        $post = DB::table('posts') -> select('UPDATE tasks SET title = ? and body = ? WHERE id = ?') -> get();
        return $post;
    }
    // delete that post 
    function deletePost()
    {
        $post = DB::table('posts') -> select('DELETE FROM posts WHERE id = ?') -> get();
    }
   
}
