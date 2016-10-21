<?php

namespace App\ACL\Models;

use Illuminate\Database\Eloquent\Model;
use App\ACL\Models\Role;

class Permission extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
