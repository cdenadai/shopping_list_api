<?php

namespace App\BusinessRules\AdminAuth\Validators;

use App\BusinessRules\Base\Validators\BaseValidator;
use App\BusinessRules\AdminAuth\Contracts\IAdminAuthSignInValidator;

class AdminAuthSignInValidator extends BaseValidator implements IAdminAuthSignInValidator
{
    public static function getRules(): iterable
    {
        return [
            'email' => 'required|email:rfc,strict,dns|exists:users',
            'password' => 'required|min:8|max:20'
        ];
    }
}
