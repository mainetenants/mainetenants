<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Session;

class customAuth
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

        if(($request->getRequestUri()=="/") && (Auth::id())){
            return redirect("/homepage");
        }elseif(($request->getRequestUri()=="/homepage") && (!Auth::id())){
            return redirect("/");
        }
        return $next($request);
    }
}
