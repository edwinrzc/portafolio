<?php

namespace App\Http\Middleware;

use Closure;

class CacheControl
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
        
        $response = $next($request);
        
        $response->header('Last-Modified', gmdate('D, d M Y H:i:s') . 'GMT');
        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate');
        $response->header('Cache-Control', 'post-check=0, pre-check=0', false);
        $response->header('Pragma', 'no-cache');
        // Or whatever you want it to be:
        // $response->header('Cache-Control', 'max-age=100');
        
        return $response;
    }
}
