<?php

namespace App\BusinessRules\Admin\Tests\Controllers;

use Mockery;
use App\BusinessRules\Admin\Tests\AdminTestCase;
use App\BusinessRules\Admin\Contracts\IAdminGetAllService;
use App\BusinessRules\Admin\Controllers\AdminGetAllController;

class AdminGetAllControllerTest extends AdminTestCase
{
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->mock(IAdminGetAllService::class, function ($mock) {
            $mock->shouldReceive('getAll')->once()->andReturn([]);
        });
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

	/** @test */
    public function should_return_ok_response_with_user()
    {
        $controller = new AdminGetAllController($this->service);

        $response = $controller->getAll();

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
