<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetAuthorizationHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasCookie('jwtToken')) {
            $jwtToken = $request->cookie('jwtToken');

            $request->headers->set('Authorization', 'Bearer ' . $jwtToken);
            return $next($request);
        } else {
            return redirect('/login');
        }

    }
}