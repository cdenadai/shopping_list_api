<?php

namespace App\BusinessRules\Admin\Controllers;

use App\BusinessRules\Admin\Contracts\IAdminUpdateService;
use App\BusinessRules\Base\Controllers\BaseUpdateController;

class AdminUpdateController extends BaseUpdateController
{
    public function __construct(IAdminUpdateService $service)
    {
        $this->service = $service;
    }
}
