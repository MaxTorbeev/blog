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
    public function handle($request, Closure $next, $permission)
    {
        if ($request->user() === null)
            return redirect()->route('login');

        $roles = auth()->user()->roles()->get();

        foreach ($roles as $role) {
            if ($role->hasPermissionTo($permission)) {
                return $next($request);
            }
        }

        return redirect()->route('login');
    }
}
