<?php

namespace App\Http\Middleware;

use App\Attendee;
use Closure;

class JWTMiddleware
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
        $user = Attendee::where('login_token', $request->token)->first();

        if (!$request->token || $request->token == null || !$user) {
            return response()->json([
                'message' => 'User not logged in',
            ], 401);
        }
        return $next($request);
    }
}
