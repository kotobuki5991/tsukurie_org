<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class CheckDevise
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
        $isMobile = false;
        $user_agent =  $request->header('User-Agent');
        // dd($user_agent);
        if ((strpos($user_agent, 'iPhone') !== false)
            || (strpos($user_agent, 'iPod') !== false)
            || (strpos($user_agent, 'iPad') !== false)
            || (strpos($user_agent, 'Android') !== false)) {
            $isMobile = true;
        }
        View::share('isMobile', $isMobile);
        return $next($request);
    }
}
