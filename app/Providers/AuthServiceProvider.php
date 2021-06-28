<?php

namespace App\Providers;

use Laravel\Passport\Passport;
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
        'App\Models\Profile' => 'App\Policies\ProfilePolicy',
        'App\Models\Helper' => 'App\Policies\HelperPolicy',
        'App\Models\Edition' => 'App\Policies\EditionPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::hashClientSecrets();

        Gate::define('is-admin', function ($user) {
            return ($user->is_admin == true);
        });
    }
}
