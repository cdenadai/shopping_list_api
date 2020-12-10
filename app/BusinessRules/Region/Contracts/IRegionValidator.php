<?php

namespace App\BusinessRules\Region\Contracts;

interface IRegionValidator
{
    public function validate(array $data);
    public static function getRules();
}
