<?php

namespace App\BusinessRules\AdminAuth\Tests\Controllers;

use App\BusinessRules\AdminAuth\Tests\AdminAuthTestCase;
use App\BusinessRules\AdminAuth\Services\AdminAuthSignInService;
use App\BusinessRules\AdminAuth\Controllers\AdminAuthSignInController;
use Illuminate\Http\Request;
use Mockery;

class AdminAuthSignInControllerTest extends AdminAuthTestCase
{
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();

        $adminUser = $this->makeFakeAdminUser();

        $signinForm = [
            'email' => $adminUser->email,
            'password' => 'password'
        ];

        $this->request = $this->mock(Request::class, function ($mock) use ($signinForm) {
            $mock->shouldReceive('all')->once()->andReturn($signinForm);
        });

        $this->service = $this->mock(AdminAuthSignInService::class, function ($mock) use ($adminUser) {
            $mock->shouldReceive('signin')->once()->andReturn($adminUser);
        });
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

	/** @test */
    public function should_try_to_signin()
    {
        $controller = new AdminAuthSignInController($this->service);

        $response = $controller->signin($this->request);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
