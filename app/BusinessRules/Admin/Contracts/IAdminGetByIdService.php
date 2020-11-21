<?php

namespace App\BusinessRules\Admin\Contracts;

use App\BusinessRules\Base\Contracts\IGetByIdService;

interface IAdminGetByIdService extends IGetByIdService
{
    public function getById(int $id) : object;
}
