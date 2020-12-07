<?php

namespace App\BusinessRules\AdminAuth\Tests\Services;

use App\BusinessRules\AdminAuth\Tests\AdminAuthTestCase;

class AdminAuthSignInServiceTest extends AdminAuthTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->signinService = resolve('App\BusinessRules\AdminAuth\Services\AdminAuthSignInService');
    }

    /** @test */
    public function should_signin()
    {
        $adminUser = $this->makeFakeAdminUser();

        $signinForm = [
            'email' => $adminUser->email,
            'password' => "password"
        ];

        $admin = $this->signinService->signin($signinForm);

        $this->assertEquals('admin', $admin->level);
    }
}
