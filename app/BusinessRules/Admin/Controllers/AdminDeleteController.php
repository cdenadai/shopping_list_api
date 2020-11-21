<?php

namespace App\BusinessRules\Admin\Controllers;

use App\BusinessRules\Admin\Contracts\IAdminDeleteService;
use App\BusinessRules\Base\Controllers\BaseDeleteController;

class AdminDeleteController extends BaseDeleteController
{
    public function __construct(IAdminDeleteService $service)
    {
        $this->service = $service;
    }
}
