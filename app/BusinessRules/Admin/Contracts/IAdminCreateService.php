<?php

namespace App\BusinessRules\Admin\Contracts;

use App\BusinessRules\Base\Contracts\ICreateService;

interface IAdminCreateService extends ICreateService
{
    public function create(iterable $data) : object;
}
