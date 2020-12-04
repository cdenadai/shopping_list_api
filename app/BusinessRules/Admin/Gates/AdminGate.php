<?php

namespace App\BusinessRules\Admin\Gates;

use Illuminate\Support\Facades\Gate;
use App\BusinessRules\Admin\Models\Admin;
use App\BusinessRules\Admin\Contracts\IAdminGate;

class AdminGate implements IAdminGate
{
    public static function authorize(string $permission): bool
    {
        return Gate::authorize($permission, Admin::class) == true;
    }
}
