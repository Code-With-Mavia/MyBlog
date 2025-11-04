<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequireUserSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        if (!session('user_id')) {
            return redirect('/login');
        }
        return $next($request);
    }

}
