<?php

namespace App\BusinessRules\Base\Contracts;

interface IUpdateService
{
    public function update(iterable $data, int $id) : object;
}
