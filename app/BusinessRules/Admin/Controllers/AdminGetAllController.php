<?php

namespace App\BusinessRules\Admin\Controllers;

use App\BusinessRules\Admin\Contracts\IAdminGetAllService;
use App\BusinessRules\Base\Controllers\BaseGetAllController;

class AdminGetAllController extends BaseGetAllController
{
    public function __construct(IAdminGetAllService $service)
    {
        $this->service = $service;
    }
}
