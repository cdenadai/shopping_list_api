<?php

namespace App\BusinessRules\Region\Contracts;

use App\BusinessRules\Base\Contracts\IGetByIdService;

interface IRegionGetByIdService extends IGetByIdService
{
    public function getById(int $id) : object;
}
