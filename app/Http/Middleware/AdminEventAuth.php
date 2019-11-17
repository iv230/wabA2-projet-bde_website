<?php

namespace App\Http\Middleware;

use Closure;

class AdminEventAuth
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
        if (!session()->has('user')) {
            return redirect('/login');
        }

        $role = session('role');

        if ($role != 2 && $role != 4) {
            return redirect('/');
        }

        return $next($request);
    }
}
