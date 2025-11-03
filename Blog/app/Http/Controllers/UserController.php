<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    function getUser()
    {
        return "Welcome to my first website";
    }

    function getUserInfo()
    {
        $result = DB::table("users") -> get();
        // return view('users',['users'=>$result]);
        return $result;
    }
   
}
?>