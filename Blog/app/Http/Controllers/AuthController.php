<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate(
[
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $userId = DB::table('users')->insertGetId(
        [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        session(['user_id' => $userId]);
        return redirect('/posts');
    }

    public function login(Request $request)
    {
        $user = DB::table('users')->where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) 
        {
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