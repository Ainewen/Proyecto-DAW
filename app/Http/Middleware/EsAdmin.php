<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class EsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   //para administradores = 1 o editores = 2
        if (Auth::user() &&  Auth::user()->roles_id >= 1) {
             return $next($request);
        }

        return redirect('/')->with('flash_message_error','No tiene permisos para ver esta página');
    }
}