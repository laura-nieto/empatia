<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Empresa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->admin == 0) {
            return $next($request);
        }else{
            if ($request->user()->empresa_id != request()->segment(3)) {
                return redirect('/dashboard')->with('error','No tienes permiso para esa url');
            }else{
                return $next($request);
            }
        }
    }
}
