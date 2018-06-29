<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use MaxTor\MXTCore\Models\Permission;
use MaxTor\MXTCore\Models\Role;
use MaxTor\MXTCore\Policies\RolePolicies;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null, $role = null, $permissions = null)
    {
        $user = $user ?: create(User::class);


        $user = $this->assignRoleToUser($user, $role, $permissions);

        RolePolicies::define();

        $this->actingAs($user);

        return $this;
    }

    /**
     * Применяем роли и разрешения к пользователю.
     *
     * @param $user
     * @param null $role
     * @param null $permissions
     * @return mixed
     */
    protected function assignRoleToUser($user, $role = null, $permissions = null)
    {
        if($role !== null){
            $role = create(Role::class, ['name' => $role ]);

            if($permissions !== null){
                if(is_array($permissions)){
                    foreach ($permissions as $permission){
                        $role->givePermissionTo(create(Permission::class, ['name' => $permission]));
                    }
                } else {
                    $role->givePermissionTo(create(Permission::class, ['name' => $permissions]));
                }
            }

            $user->assignRole($role->name);
        }

        return $user;
    }
}
