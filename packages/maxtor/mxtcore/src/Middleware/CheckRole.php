<?php

namespace MaxTor\MXTCore\Middleware;

use Closure;

class CheckRole
{
    /**
     * The guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($request->user() === null)
            return redirect()->route('login');

        if (!$request->user()->hasRole($role)) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
