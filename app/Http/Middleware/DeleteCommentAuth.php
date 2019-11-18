<?php

namespace App\Http\Middleware;

use Closure;

class DeleteCommentAuth
{
    /**
     * Handle an incoming request.
     * Use to prevent comment deletion from non-admins
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

        if (!$role < 3) {
            abort(403, 'Forbidden - Vous n\'êtes pas autorisé à supprimer un commentaire');
        }

        return $next($request);
    }
}
