<?php

namespace App\BusinessRules\Region\Controllers;

use App\BusinessRules\Base\Controllers\BaseCreateController;
use App\BusinessRules\Region\Contracts\IRegionCreateService;

class RegionCreateController extends BaseCreateController
{
    public function __construct(IRegionCreateService $service)
    {
        $this->service = $service;
    }
}
