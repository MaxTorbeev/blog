<?php

use Illuminate\Database\Seeder;

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
    }
}
