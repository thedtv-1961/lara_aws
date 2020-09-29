<?php

/*
 * GATE
 *
 * routes: / (hi) not show admin link
 *
 *
 * User "guest":
 * + allow: nothing
 * + deny: product list, product create
 *
 * User "staff"
 * + allow: / show admin link, product list
 * + deny: product create
 *
 * User "admin"
 * + allow: / show admin link, product list, product create
 * + deny: no deny
 */

namespace App\Providers;

use App\Common\Constant;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('check-admin-gate', function ($user){
            return $user->hasRole(Constant::ROLE_ADMIN);
        });
    }
}
