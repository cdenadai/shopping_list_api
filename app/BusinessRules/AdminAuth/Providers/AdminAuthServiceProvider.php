<?php

namespace App\BusinessRules\AdminAuth\Providers;

use Illuminate\Support\ServiceProvider;

use App\BusinessRules\AdminAuth\Contracts\IAdminAuthSignInValidator;
use App\BusinessRules\AdminAuth\Validators\AdminAuthSignInValidator;

use App\BusinessRules\AdminAuth\Contracts\IAdminAuthSignInService;
use App\BusinessRules\AdminAuth\Services\AdminAuthSignInService;

class AdminAuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IAdminAuthSignInService::class, AdminAuthSignInService::class);
        $this->app->bind(IAdminAuthSignInValidator::class, AdminAuthSignInValidator::class);
    }

    public function boot()
    {
    }
}
