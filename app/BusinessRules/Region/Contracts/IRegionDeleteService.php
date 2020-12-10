<?php

namespace App\BusinessRules\Region\Contracts;

use App\BusinessRules\Base\Contracts\IDeleteService;

interface IRegionDeleteService extends IDeleteService
{
    public function delete(int $id) : bool;
}
