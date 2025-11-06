<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\V1\Models\User;
use Exception;
class UserControllerApi extends Controller
{
    //          USERS METHODS           //
    // GET /api/users/{id}/posts
    public function userPosts($id)
    {
        try 
        {
            $user = User::find($id);
            if (!$user) 
            {
               throw new Exception('Failed to fetch user posts. Please try again later');
            }
            return response()->json($user->posts);
        } 
        catch (Exception $e) 
        {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    // GET /api/users/recent
    public function recentUsers()
    {
        try 
        {
            $users = User::latest()->limit(30)->get();
            if(count($users) == 0)
            {
                throw new Exception('Failed to fetch recent users. Please try again later');
            }
            $userSummaries = $users->map(function ($user) { 
                return [
                'id'=> $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'posts_count' => $user->posts()->count(),
                'registered_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];
            });
            return response()->json($userSummaries, 200);
        } 
        catch (Exception $e) 
        {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    // GET /api/users/{id}/stats
    public function userStats($id)
    {
        try 
        {
            $user = User::find($id);
            if (!$user) 
            {
                throw new Exception('Failed to fetch user stats. Please try again later');
            }
            return response()->json([
                'name' => $user->name,
                'email' => $user->email,
                'posts_count' => $user->posts()->count(),
                'registered_at' => $user->created_at,
                'updated_at'=> $user->updated_at,
            ]);
        } 
        catch (Exception $e) 
        {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
