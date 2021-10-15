<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$params)
    {
        $userRole = $request->user()->role;
        if(in_array($userRole, $params))
        {
            return $next($request);
        }
        
        return response()->json(
            [
                'status' => __('default.status_error'),
                'message' => __('auth.role_denied'),
            ]
        , 403);

    }
}
