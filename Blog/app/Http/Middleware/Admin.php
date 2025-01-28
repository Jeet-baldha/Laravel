<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guest()) {
            return redirect('/')->with('success', 'You can not access this page');
        }

        if (auth()->user()->username !== "jeet-baldha") {
            return redirect('/')->with('success', ' You can not access this page');
        }
        return $next($request);
    }
}
