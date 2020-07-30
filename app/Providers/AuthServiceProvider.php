<?php

namespace App\Providers;

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
        'App\Profile' => 'App\Policies\ProfilePolicy',
        'App\Helper' => 'App\Policies\HelperPolicy',
        'App\Edition' => 'App\Policies\EditionPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is-admin', function ($user) {
            return ($user->is_admin == true);
        });
    }
}
