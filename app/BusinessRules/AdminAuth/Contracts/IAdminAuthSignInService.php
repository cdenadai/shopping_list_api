<?php

namespace App\BusinessRules\AdminAuth\Contracts;

interface IAdminAuthSignInService
{
    public function signin(iterable $credentials) : object;
}
