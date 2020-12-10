<?php

namespace App\BusinessRules\Region\Contracts;

use App\BusinessRules\Base\Contracts\IGetAllService;

interface IRegionGetAllService extends IGetAllService
{
    public function getAll() : iterable;
}
