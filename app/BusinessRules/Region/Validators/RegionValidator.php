<?php

namespace App\BusinessRules\Region\Validators;

use App\BusinessRules\Base\Validators\BaseValidator;
use App\BusinessRules\Region\Contracts\IRegionValidator;

class RegionValidator extends BaseValidator implements IRegionValidator
{
    public static function getRules(): iterable
    {
        return [
            'name' => 'required|max:255',
            'location' => 'required'
        ];
    }
}
