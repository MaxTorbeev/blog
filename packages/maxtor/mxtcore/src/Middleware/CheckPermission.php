<?php

namespace MaxTor\MXTCore\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        if (!$request->user()->hasRole($role)) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
