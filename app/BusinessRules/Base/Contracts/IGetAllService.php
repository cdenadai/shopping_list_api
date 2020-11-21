<?php

namespace App\BusinessRules\Base\Contracts;

interface IGetAllService
{
    public function getAll() : iterable;
}
