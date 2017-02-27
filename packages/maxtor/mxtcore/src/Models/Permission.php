<?php

namespace MaxTor\MXTCore\Models;

use Illuminate\Database\Eloquent\Model;
use MaxTor\MXTCore\Exceptions\PermissionDoesNotExist;
use \MaxTor\MXTCore\Models\Role;

class Permission extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * A permission can be applied to users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(config('auth.providers.users.model'));
    }

    /**
     * Find a permission by its name.
     *
     * @param string $name
     *
     * @throws PermissionDoesNotExist
     */
    public static function findByName($name)
    {
        $permission = static::where('name', $name)->first();

        if (! $permission) {
            throw new PermissionDoesNotExist();
        }

        return $permission;
    }

}
