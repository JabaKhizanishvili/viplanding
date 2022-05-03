<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Illuminate\Http\Request;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->exists('loggedUser')) {
            // return redirect(Route('costum'));
            echo '';
        } else {
            return redirect(Route('index'));
        }
        return $next($request);
    }
}
