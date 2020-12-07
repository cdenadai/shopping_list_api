<?php

namespace App\BusinessRules\Admin\Tests\Controllers;

use Mockery;
use Illuminate\Http\Request;
use App\BusinessRules\Admin\Models\Admin;
use App\BusinessRules\Admin\Tests\AdminTestCase;
use App\BusinessRules\Admin\Contracts\IAdminCreateService;
use App\BusinessRules\Admin\Controllers\AdminCreateController;

class AdminCreateControllerTest extends AdminTestCase
{
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();
        $createForm = $this->validCreationFormWithoutLevel();

        $this->request = $this->mock(Request::class, function ($mock) use ($createForm) {
            $mock->shouldReceive('all')->once()->andReturn($createForm);
        });

        $this->service = $this->mock(IAdminCreateService::class, function ($mock) {
            $mock->shouldReceive('create')->once()->andReturn(new Admin());
        });
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

	/** @test */
    public function should_return_ok_response_with_user()
    {
        $controller = new AdminCreateController($this->service);

        $response = $controller->create($this->request);

        $this->assertEquals($response->getStatusCode(), 201);
    }
}
