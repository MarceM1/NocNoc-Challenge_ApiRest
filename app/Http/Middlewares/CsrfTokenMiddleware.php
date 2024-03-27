<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class CsrfTokenMiddleware extends Middleware
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
        $token = $request->header('X-CSRF-TOKEN');

    if (!csrf_token() || !hash_equals($token, csrf_token())) {
        return response()->json([
            'message' => 'CSRF token mismatch.',
        ], 403);
    }


        return $next($request);
    }
}
