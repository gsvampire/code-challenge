<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebLogin
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
        $uri = $request->getRequestUri();

        if (!Auth::guard('web')->check()) {
            if($uri == '/act/detail' || $uri == '/act/detail/1'){
                return redirect('/login');
            }else{
                return redirect('/login/vip');
            }

        }
        return $next($request);
    }
}
