<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->power == 1 && Auth::user()->status == 1) {
            return $next($request);
        } else {
            return redirect()->route('signin')->with('message', 'Bạn không có quyền truy cập trang web này');
        }
        return $next($request);
    }
}
