<?php

namespace App\BusinessRules\Admin\Contracts;

use App\BusinessRules\Admin\Models\Admin;

interface IAdminGate
{
    public static function authorize(string $permission): bool;
}
