<?php

namespace App\BusinessRules\Base\Contracts;

interface IDeleteService
{
    public function delete(int $id) : bool;
}
