<?php

namespace App\BusinessRules\Admin\Providers;

use App\Providers\AuthServiceProvider;

class AdminAuthorizationServiceProvider extends AuthServiceProvider
{
    protected $policies = [
        'App\BusinessRules\Admin\Models\Admin' => 'App\BusinessRules\Admin\Gates\AdminServicePolicy',
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
