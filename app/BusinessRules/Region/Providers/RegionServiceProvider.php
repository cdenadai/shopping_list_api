<?php

namespace App\BusinessRules\Region\Providers;

use Illuminate\Support\ServiceProvider;

use App\BusinessRules\Region\Contracts\IRegionValidator;
use App\BusinessRules\Region\Validators\RegionValidator;

use App\BusinessRules\Region\Contracts\IRegionCreateService;
use App\BusinessRules\Region\Contracts\IRegionUpdateService;
use App\BusinessRules\Region\Contracts\IRegionGetAllService;
use App\BusinessRules\Region\Contracts\IRegionDeleteService;
use App\BusinessRules\Region\Contracts\IRegionGetByIdService;

use App\BusinessRules\Region\Services\RegionCreateService;
use App\BusinessRules\Region\Services\RegionUpdateService;
use App\BusinessRules\Region\Services\RegionGetAllService;
use App\BusinessRules\Region\Services\RegionDeleteService;
use App\BusinessRules\Region\Services\RegionGetByIdService;

class RegionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IRegionCreateService::class, RegionCreateService::class);
        $this->app->bind(IRegionUpdateService::class, RegionUpdateService::class);
        $this->app->bind(IRegionGetAllService::class, RegionGetAllService::class);
        $this->app->bind(IRegionGetByIdService::class, RegionGetByIdService::class);
        $this->app->bind(IRegionDeleteService::class, RegionDeleteService::class);

        $this->app->bind(IRegionValidator::class, RegionValidator::class);
    }

    public function boot()
    {
    }
}
