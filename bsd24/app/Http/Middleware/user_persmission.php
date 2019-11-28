<?php

namespace App\Http\Middleware;

use Closure;

class user_persmission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('user_info')) {
            
            return $next($request);
        }
        else
        {
            return redirect('/login');
        }
    }
}
