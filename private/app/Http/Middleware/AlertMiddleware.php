<?php

namespace App\Http\Middleware;

use Closure;

class AlertMiddleware
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
        if( $request->session()->get('alerta') ){
                
            $request->session()->flash('alerta', 'si');
            $request->session()->flash('status', 'success');
            $request->session()->flash('mensaje', 'pijo');

            return $next($request);
        }
        
        
        return $next($request);
    }
}
