<?php

namespace App\BusinessRules\Region\Controllers;

use App\BusinessRules\Base\Controllers\BaseGetAllController;
use App\BusinessRules\Region\Contracts\IRegionGetAllService;

class RegionGetAllController extends BaseGetAllController
{
    public function __construct(IRegionGetAllService $service)
    {
        $this->service = $service;
    }
}
