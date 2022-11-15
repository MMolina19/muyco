<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider {
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();

        Gate::define('loggged-in', function($user){
            return $user;
        });

        Gate::define('is-admin', function(User $user){
            return $user->hasAnyRole('Admin');
            //return $user->hasAnyRole(['admin','client','manufacturer']);
        });

        Gate::define('isAdmin', function($user) {
            return $user->roles == 'admin';
        });
        Gate::define('isManufacturer', function($user) {
            return $user->roles == 'manufacturer';
        });
        Gate::define('isCustomer', function($user) {
            return $user->roles == 'customer';
        });
    }
}
