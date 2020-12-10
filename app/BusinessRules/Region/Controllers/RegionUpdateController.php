<?php

namespace App\BusinessRules\Region\Controllers;

use App\BusinessRules\Base\Controllers\BaseUpdateController;
use App\BusinessRules\Region\Contracts\IRegionUpdateService;

class RegionUpdateController extends BaseUpdateController
{
    public function __construct(IRegionUpdateService $service)
    {
        $this->service = $service;
    }
}
