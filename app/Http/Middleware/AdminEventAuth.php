<?php

namespace App\Http\Middleware;

use Closure;

class AdminEventAuth
{
    /**
     * Handle an incoming request.
     * Used to prevent access admin page to non-admins
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
            abort('403', 'Forbidden - L\'accès à cette page est réservée aux membres du BDE');
        }

        return $next($request);
    }
}
