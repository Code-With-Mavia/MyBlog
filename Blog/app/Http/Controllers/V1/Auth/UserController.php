<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\V1\Models\User;

class UserController extends Controller
{
    // public function getUser()
    // {
    //     return "Welcome to my first website";
    // }

    public function getUserInfo()
    {
        return view('users', ['users' => User::all()]);
    }
}

?>