<?php

namespace App\BusinessRules\Admin\Contracts;

use App\BusinessRules\Base\Contracts\IUpdateService;

interface IAdminUpdateService extends IUpdateService
{
    public function update(iterable $data, int $id) : object;
}
