<?php

namespace App\BusinessRules\AdminAuth\Contracts;

interface IAdminAuthSignInValidator
{
    public function validate(iterable $data);
    public static function getRules();
}
