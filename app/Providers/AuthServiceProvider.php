<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('isAdmin', function ($user) {
            return $user->user_type == 'admin';
        });

        $gate->define('isUser', function ($user) {
            return $user->user_type == 'user';
        });

        $gate->define('isAccount', function ($user) {
            return $user->user_type == 'account';
        });

        $gate->define('isAccess', function ($user) {
            return $user->user_type == 'access';
        });
        $gate->define('isTenant', function ($user) {
            return $user->user_type == 'tenant';
        });


        $gate->define('isGuest', function ($user) {
            return $user->user_type == 'guest';
        });


        $gate->define('isMall', function ($user) {
            return $user->user_type == 'mall';
        });

        //
    }
}
