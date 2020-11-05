<?php

namespace App\Http\Middleware;

use App\Event;
use Closure;

class EventMiddleware
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
        if ($request->route('event')) {
            $event = Event::find($request->route('event'));

            if ($event->organizer_id != auth()->user()->id) {
                abort(403);
            }
        }
        return $next($request);
    }
}
