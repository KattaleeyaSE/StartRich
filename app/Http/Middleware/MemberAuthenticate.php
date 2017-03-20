<?php

namespace App\Http\Middleware;

use Closure;

class MemberAuthenticate
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
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response(trans('backpack::base.unauthorized'), 401);
            } else {
                return redirect()->guest('/login');
            }
        }else if(Auth::check() && is_null(Auth::user()->member))
        {
            return redirect()->intended('/');
        } 

        return $next($request);
    }
}
