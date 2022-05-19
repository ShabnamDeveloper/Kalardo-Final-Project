<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Permission;
use App\Policies\OrderPolicy;
use App\Policies\UserPolicy;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Order::class => OrderPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
//
        Gate::before(function($user) {
            if($user->isSuperUser()) return true;
        });

        foreach (Permission::all() as $permission) {
            Gate::define($permission->name , function($user) use ($permission){
                return $user->hasPermission($permission);
            });
        }
    }
}
