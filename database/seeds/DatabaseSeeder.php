<?php

use Illuminate\Database\Seeder;
use MaxTor\MXTCore\Models\Permission;
use MaxTor\MXTCore\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MenuTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class
        ]);

        $this->changeAllPermissionToRole();
    }

    /**
     * Change all permissions to change role.
     *
     * @param string $role
     * @return Void
     */
    protected function changeAllPermissionToRole($role = 'root'):Void
    {
        $user = \App\User::where('id', 1)->first();
        $user->assignRole($role);

        $changedRole = Role::where('name', $role)->first();

        foreach(Permission::all() as $permission){
            $changedRole->givePermissionTo($permission);
        }
    }
}
