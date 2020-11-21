<?php

namespace App\BusinessRules\Base\Contracts;

interface IValidator
{
    public function validate(iterable $data): iterable;
    public static function getRules(): iterable;
}
