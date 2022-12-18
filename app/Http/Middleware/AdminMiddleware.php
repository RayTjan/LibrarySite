<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Restricts normal user to reach the librarian page
     */
    public function handle(Request $request, Closure $next)
    {
        //admin role == 0
        //user role == 1

        if(Auth::check()){
            if(Auth::user()->role == '0'){
                return $next($request);
            }else{
                return redirect('/reader')->with('message'.'Access denied');
            }
        }else{
            return redirect('/dashboard')->with('message'.'Access denied');
        }
        
    }
}
