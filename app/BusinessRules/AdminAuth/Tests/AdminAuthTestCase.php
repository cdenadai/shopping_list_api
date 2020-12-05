<?php

namespace App\BusinessRules\AdminAuth\Tests;

use Tests\TestCase;
use App\BusinessRules\Admin\Models\Admin;

class AdminAuthTestCase extends TestCase
{
    public function makeAdminFakeUser()
    {
        return Admin::factory()->count(1)->create()->first();
    }
}
