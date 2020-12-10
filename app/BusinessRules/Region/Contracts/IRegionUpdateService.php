<?php

namespace App\BusinessRules\Region\Contracts;

use App\BusinessRules\Base\Contracts\IUpdateService;

interface IRegionUpdateService extends IUpdateService
{
    public function update(iterable $data, int $id) : object;
}
