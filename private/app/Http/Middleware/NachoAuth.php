<?php

namespace App\Http\Middleware;

use Closure;

class NachoAuth
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
        
        $user = \Illuminate\Support\Facades\Auth::user();
        if($user === null ) {
            return redirect(url('/'));
        }
        return $next($request);
        
        
        
    }
}
