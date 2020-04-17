<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // 不包含某角色,返回未授权
        if (! $request->user()->hasRole($role)) {
          return response()->json(['error' => 'Unauthorized']);
        }

        return $next($request);
    }
}
