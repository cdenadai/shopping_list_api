<?php

namespace App\BusinessRules\Admin\Contracts;

use App\BusinessRules\Base\Contracts\IValidator;

interface IAdminUpdateValidator extends IValidator
{
    public function validate(iterable $data): iterable;
    public static function getRules(): iterable;
}
