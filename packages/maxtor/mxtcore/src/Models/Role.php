<?php

namespace MaxTor\MXTCore\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @use $role->permissions()
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Sync roles on permission.
     *
     * @param Permission $permission
     * @return Model
     */
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }

    /**
     * Determine if the user may perform the given permission.
     *
     * @param string|Permission $permission
     * @return bool
     */
    public function hasPermissionTo($permission)
    {
        if (is_string($permission)) {
            $permission = app(Permission::class)->findByName($permission);
        }

        return $this->permissions->contains('id', $permission->id);
    }
}
