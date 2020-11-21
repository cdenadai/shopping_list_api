<?php

namespace App\BusinessRules\Base\Contracts;

interface IGetByIdService
{
    public function getById(int $id) : object;
}
