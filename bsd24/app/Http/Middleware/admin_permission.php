<?php

namespace App\Http\Middleware;

use Closure;

class admin_permission
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
        $session_valueee = session('admin_login_info', 'none');
        if($session_valueee=="none")
        {
            return redirect('/admin/login');
        }
        else
        {
            return $next($request);
        }
    }
}
