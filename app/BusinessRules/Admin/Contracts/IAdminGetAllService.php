<?php

namespace App\BusinessRules\Admin\Contracts;

use App\BusinessRules\Base\Contracts\IGetAllService;

interface IAdminGetAllService extends IGetAllService
{
    public function getAll() : iterable;
}
