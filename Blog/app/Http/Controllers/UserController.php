<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function getUser()
    {
        return "Welcome to my first website";
    }

    public function getUserInfo()
    {
        return User::all();
        // For blade: return view('users', ['users' => User::all()]);
    }
}

?>