<?php

namespace App\Http\Middleware;

use Closure;

class UserAuth
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

        if ($role != 4) {
            abort('403', 'Forbidden - L\'accès à cette page est réservé aux administrateurs');
        }

        return $next($request);
    }
}
