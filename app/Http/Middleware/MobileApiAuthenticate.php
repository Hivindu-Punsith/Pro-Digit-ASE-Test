<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class MobileApiAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = Config::get('apitoken.PUBLIC_API_TOKEN');
        $requestToken = $request->header('api-token');
        
        if ($requestToken !== $token) {
            return response()->json(['error' => 'Unauthenticated!'], 401);
        }

        return $next($request);
    }
}
