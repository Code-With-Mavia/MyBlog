<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\V1\Models\Category;
use App\Http\Controllers\V1\Models\Post;
use Exception;
class CategoryControllerApi extends Controller
{
    //          CATEGORIES METHODS           //
    
    // GET api/categories
    public function listCategories()
    {
        try 
        {
            $categories = Category::select('id','name','slug','created_at','updated_at')->withCount('posts')->paginate(10);

            if ($categories->count() == 0) 
            {
                throw new Exception('Categories not found', 402);
            }
            return response()->json($categories, 200);
        }
        catch (Exception $e)
        {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    
    // GET api/categories/{id}
    public function CategoryById($id)
    {
        try
        {
            $category = Category::withCount('posts')->find($id);
            if (!$category) {
                throw new Exception('Category not found', 404);
            }
            $posts = $category->posts()->select('id', 'user_id', 'title', 'body', 'comments', 'created_at', 'updated_at')->get();

            return response()->json([
                'id'          => $category->id,
                'name'        => $category->name,
                'slug'        => $category->slug,
                'posts_count' => $category->posts_count,
                'posts'       => $posts,
            ], 200);
        }
        catch (Exception $e)
        {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

}
