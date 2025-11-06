<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\V1\Models\Category;

class CategoryController extends Controller
{
    // Show ALL categories in a Blade view
    public function index()
    {
        $categories = Category::withCount('posts')->get();
        return view('categories.index', compact('categories'));
    }

    // Show a single category with its posts
    public function show($id)
    {
        $category = Category::with(['posts' => function($q){
            $q->select('id', 'category_id', 'user_id', 'title', 'body', 'created_at');
        }])->withCount('posts')->findOrFail($id);
        return view('categories.show', compact('categoriesList'));
    }

}