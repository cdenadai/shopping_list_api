<?php

namespace App\BusinessRules\Base\Contracts;

interface ICreateService
{
    public function create(iterable $data) : object;
}
