<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use App\Ad;

class UserOrAdmin
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
        if (Auth::check()) {
            if ($request->segments()[0] === 'user') {
                $user = User::findOrFail($request->segments()[1]);
                if (Auth::user()->role === 'admin' || Auth::user()->id === $user->id) {
                    return $next($request);
                }
            }
            if ($request->segments()[0] === 'ads') {
                $ad = Ad::findOrFail($request->segments()[1]);
                if (Auth::user()->role === 'admin' || Auth::user()->id === $ad->user_id) {
                    return $next($request);
                }
            }
        }
        return abort(403, 'Unauthorized Access');
    }
}
