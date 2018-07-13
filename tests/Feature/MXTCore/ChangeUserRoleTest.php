<?php

namespace Tests\Feature\MXTCore;

use App\User;
use MaxTor\MXTCore\Models\Permission;
use MaxTor\MXTCore\Models\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChangeUserRoleTest extends TestCase
{
    use RefreshDatabase;

    /**
     *  Мы можешь дать роли разрешения.
     *
     * @test
     */
    public function role_give_permissions()
    {
        $role = create(Role::class, [
            'name' => 'root',
            'label' => 'Супер пользователь'
        ]);

        $permission = create(Permission::class, [
            'name' => 'access_dashboard',
            'label' => 'Доступ в панель управления'
        ]);

        $role->givePermissionTo($permission);

        $this->assertTrue($role->hasPermissionTo('access_dashboard'));
    }

    /**
     * Мы можем применить пользователю роль.
     *
     * @test
     */
    public function assing_role_on_user()
    {
        $user = create(User::class);
        $role = create(Role::class, [
            'name' => 'root',
            'label' => 'Супер пользователь'
        ]);

        $user->assignRole($role->name);

        $this->assertTrue($user->hasRole('root'));
    }

}