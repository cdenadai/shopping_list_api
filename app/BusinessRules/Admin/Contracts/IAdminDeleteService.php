<?php

namespace App\BusinessRules\Admin\Contracts;

use App\BusinessRules\Base\Contracts\IDeleteService;

interface IAdminDeleteService extends IDeleteService
{
    public function delete(int $id) : bool;
}
