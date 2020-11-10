<?php

namespace App\Http\Middleware;

use Closure;

class DashboardCuAuthenticate
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
        $value = session('berhasil_login');
        if(!$value)
        {
            return redirect('/login');
        }

        return $next($request);
    }
}