<?php

namespace MaxTor\MXTCore\Policies;

use Gate;
use Cache;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use MaxTor\MXTCore\Models\Permission;

class RolePolicies
{
    use HandlesAuthorization;

    public static function define()
    {
        foreach (self::getPermissions() as $permission) {
            Gate::define($permission->name, function ($user) use ($permission) {
                return $user->hasRole($permission->roles);
            });
        }
    }

    protected static function getPermissions()
    {
        try {
            return Cache::remember("auth.permissions", 10, function () {
                return Permission::with('roles')->get();
            });
        } catch (\Exception $e) {
            return [];
        }
    }
}
