<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StudentAuthenticate
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('student')->check()) {
            return $next($request);
        } else {
            
        }
    }
}