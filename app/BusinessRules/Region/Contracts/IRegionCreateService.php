<?php

namespace App\BusinessRules\Region\Contracts;

use App\BusinessRules\Base\Contracts\ICreateService;

interface IRegionCreateService extends ICreateService
{
    public function create(iterable $data) : object;
}
