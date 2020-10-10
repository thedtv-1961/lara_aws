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

use App\Models\Product;
use App\Common\Constant;
use Laravel\Passport\Passport;
use App\Policies\ProductPolicy;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Product::class => ProductPolicy::class,
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

        Passport::routes();
        Passport::tokensExpireIn(now()->addMinutes(5));
        // Passport::refreshTokensExpireIn(now()->addDays(30));
        // Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }
}
