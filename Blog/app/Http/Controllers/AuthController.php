<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        session(['user_id' => $user->id]);
        return redirect('/posts');
    }

    public function login(Request $request)
    {
        // Use Eloquent with safe query and mass assign
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_id' => $user->id]);
            return redirect('/posts');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        session()->forget('user_id');
        return redirect('/login');
    }
}


?>