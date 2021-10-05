<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;

class Sudahlogin
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
        if (session('id_user') == NULL) {
            return redirect('/');
        }
        return $next($request);
    }
}
