<?php

namespace App\BusinessRules\Region\Controllers;

use App\BusinessRules\Base\Controllers\BaseDeleteController;
use App\BusinessRules\Region\Contracts\IRegionDeleteService;

class RegionDeleteController extends BaseDeleteController
{
    public function __construct(IRegionDeleteService $service)
    {
        $this->service = $service;
    }
}
