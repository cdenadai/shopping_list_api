<?php

namespace App\BusinessRules\Admin\Tests\Controllers;

use Mockery;
use App\BusinessRules\Admin\Tests\AdminTestCase;
use App\BusinessRules\Admin\Contracts\IAdminDeleteService;
use App\BusinessRules\Admin\Controllers\AdminDeleteController;

class AdminDeleteControllerTest extends AdminTestCase
{
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->mock(IAdminDeleteService::class, function ($mock) {
            $mock->shouldReceive('delete')->once()->andReturn(true);
        });
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

	/** @test */
    public function should_return_ok_response_with_user()
    {
        $controller = new AdminDeleteController($this->service);

        $response = $controller->delete(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
