<?php

namespace MaxTor\MXTCore\Models;

use Illuminate\Database\Eloquent\Model;
use \MaxTor\MXTCore\Models\Role;

class Permission extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
