<?php

namespace App\BusinessRules\AdminAuth\Tests\Login;

use App\BusinessRules\AdminAuth\Tests\AdminAuthTestCase;

class AdminAuthLoginServiceTest extends AdminAuthTestCase
{
    protected $signinService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signinService = resolve('App\BusinessRules\AdminAuth\Services\AdminAuthSignInService');
    }

    /** @test */
    public function should_signin()
    {
        $adminUser = $this->makeAdminFakeUser();
        $loginForm = [
            'email' => $adminUser->email,
            'password' => 12345678
        ];
        $admin = $this->signinService->signin($loginForm);

        $this->assertEquals('admin', $admin->level);
    }
}
