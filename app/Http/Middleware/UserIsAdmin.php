<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserIsAdmin
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
        if (Auth::check() && Auth::user()->role_id == 4) { 
            return $next($request); 
        }

        return redirect('/')->with('error', 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.'); 
    }
}
