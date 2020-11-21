<?php

namespace App\BusinessRules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use App\BusinessRules\Admin\Models\Admin;
use App\BusinessRules\Admin\Policies\AdminServicePolicy;
use App\BusinessRules\Admin\Services\AdminCreateService;
use App\BusinessRules\Admin\Services\AdminDeleteService;
use App\BusinessRules\Admin\Services\AdminGetAllService;
use App\BusinessRules\Admin\Services\AdminUpdateService;
use App\BusinessRules\Admin\Services\AdminGetByIdService;
use App\BusinessRules\Admin\Contracts\IAdminCreateService;
use App\BusinessRules\Admin\Contracts\IAdminDeleteService;
use App\BusinessRules\Admin\Contracts\IAdminGetAllService;
use App\BusinessRules\Admin\Contracts\IAdminUpdateService;
use App\BusinessRules\Admin\Contracts\IAdminGetByIdService;
use App\BusinessRules\Admin\Contracts\IAdminCreateValidator;
use App\BusinessRules\Admin\Contracts\IAdminUpdateValidator;
use App\BusinessRules\Admin\Validators\AdminCreateValidator;
use App\BusinessRules\Admin\Validators\AdminUpdateValidator;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAdminCreateService::class, AdminCreateService::class);
        $this->app->bind(IAdminGetAllService::class, AdminGetAllService::class);
        $this->app->bind(IAdminGetByIdService::class, AdminGetByIdService::class);
        $this->app->bind(IAdminUpdateService::class, AdminUpdateService::class);
        $this->app->bind(IAdminDeleteService::class, AdminDeleteService::class);

        $this->app->bind(IAdminCreateValidator::class, AdminCreateValidator::class);
        $this->app->bind(IAdminUpdateValidator::class, AdminUpdateValidator::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
