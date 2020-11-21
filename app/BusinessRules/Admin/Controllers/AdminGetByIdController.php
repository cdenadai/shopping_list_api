<?php

namespace App\BusinessRules\Admin\Controllers;

use App\BusinessRules\Admin\Contracts\IAdminGetByIdService;
use App\BusinessRules\Base\Controllers\BaseGetByIdController;

class AdminGetByIdController extends BaseGetByIdController
{
    public function __construct(IAdminGetByIdService $service)
    {
        $this->service = $service;
    }
}
