<?php

namespace App\Http\Middleware;

use Closure;

class Accueil
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
       
       if(isset(auth()->user()->role)){


        if(auth()->user()->role==1 or auth()->user()->role==3 )
        {
            
            return $next($request);
        } 


       }
        return redirect('login'); 
    }
}
