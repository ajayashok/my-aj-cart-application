<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdmin
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
        if(Auth::check())
        {
            if((Auth::user()->user_type == 1 ))
            {
                return $next($request);
            }
            else
            {
                return redirect('/category-home/');
            }
        }
        else
        {
                return redirect()->route('login');            
        }
        return $next($request);
    }
}
