<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasNotShop
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
        if(auth()->user() && auth()->user()->shop()->exists()){
            return redirect(route('shop.index'));
        }
        return $next($request);
    }
}
