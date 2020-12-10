<?php

namespace App\BusinessRules\Region\Controllers;

use App\BusinessRules\Base\Controllers\BaseGetByIdController;
use App\BusinessRules\Region\Contracts\IRegionGetByIdService;

class RegionGetByIdController extends BaseGetByIdController
{
    public function __construct(IRegionGetByIdService $service)
    {
        $this->service = $service;
    }
}
