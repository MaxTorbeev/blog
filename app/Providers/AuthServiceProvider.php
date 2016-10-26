<?php

namespace App\Providers;

use App\ACL\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Posts\Models\Post::class => \App\Policies\PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        foreach ($this->getPermissions() as $permission) {
//            Gate::define($permission->name, function($user) use ($permission) {
//                return $user->hasRole($permission->roles);
//            });
//        };
    }

    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}
