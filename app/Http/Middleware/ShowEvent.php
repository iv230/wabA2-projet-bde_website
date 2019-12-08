<?php

namespace App\Http\Middleware;

use App\Events as Events;
use Closure;

class ShowEvent
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $id
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->route('id');

        $event = Events::find($id);

        if (!isset($event)) {
            abort(404);
        }

        if ($event->hidden) {
            abort(404);
        }

        return $next($request);
    }
}
