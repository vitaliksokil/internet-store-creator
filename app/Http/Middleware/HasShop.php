<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasShop
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
        dd(auth()->user());
        if(!auth()->user()->shop()->exists()){
            return redirect('dashboard');
        }
        return $next($request);
    }
}
