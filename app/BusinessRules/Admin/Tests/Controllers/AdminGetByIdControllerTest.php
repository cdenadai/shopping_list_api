<?php

namespace App\BusinessRules\Admin\Tests\Controllers;

use Mockery;
use App\BusinessRules\Admin\Models\Admin;
use App\BusinessRules\Admin\Tests\AdminTestCase;
use App\BusinessRules\Admin\Contracts\IAdminGetByIdService;
use App\BusinessRules\Admin\Controllers\AdminGetByIdController;

class AdminGetByIdControllerTest extends AdminTestCase
{
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->mock(IAdminGetByIdService::class, function ($mock) {
            $mock->shouldReceive('getById')->once()->andReturn(new Admin());
        });
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

	/** @test */
    public function should_return_ok_response_with_user()
    {
        $controller = new AdminGetByIdController($this->service);

        $response = $controller->getById(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
