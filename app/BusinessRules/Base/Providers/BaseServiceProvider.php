<?php

namespace App\BusinessRules\Base\Providers;

use App\BusinessRules\Base\Contracts\ICreateService;
use App\BusinessRules\Base\Contracts\IDeleteService;
use App\BusinessRules\Base\Contracts\IGetAllService;
use App\BusinessRules\Base\Contracts\IGetByIdService;
use App\BusinessRules\Base\Contracts\IUpdateService;
use App\BusinessRules\Base\Services\BaseCreateService;
use App\BusinessRules\Base\Services\BaseDeleteService;
use App\BusinessRules\Base\Services\BaseGetAllService;
use App\BusinessRules\Base\Services\BaseGetByIdService;
use App\BusinessRules\Base\Services\BaseUpdateService;
use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IGetAllService::class,BaseGetAllService::class);
        $this->app->bind(IGetByIdService::class,BaseGetByIdService::class);
        $this->app->bind(ICreateService::class,BaseCreateService::class);
        $this->app->bind(IUpdateService::class,BaseUpdateService::class);
        $this->app->bind(IDeleteService::class,BaseDeleteService::class);
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
