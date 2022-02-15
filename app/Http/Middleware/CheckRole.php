<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        //     if (auth()->user()->is_admin == 1 || auth()->user()->is_admin == 1) {
        //         return $next($request);
        //     }

        //     return redirect('home')->with('error', "You don't have admin access.");
        // }
        if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2) {
            return redirect('/home');
        } else {
            return redirect('/user/dashboard');
        }
    }
}
