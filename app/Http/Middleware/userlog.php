<?php

namespace App\Http\Middleware;

use Closure;

class userlog
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
        if(!isset($_SESSION['userLogined'])) {
            return  redirect('login');
        }
        return $next($request);
    }
}
