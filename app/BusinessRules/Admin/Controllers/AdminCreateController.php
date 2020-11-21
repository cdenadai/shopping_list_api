<?php

namespace App\BusinessRules\Admin\Controllers;

use App\BusinessRules\Admin\Contracts\IAdminCreateService;
use App\BusinessRules\Base\Controllers\BaseCreateController;

class AdminCreateController extends BaseCreateController
{
    public function __construct(IAdminCreateService $service)
    {
        $this->service = $service;
    }
}
