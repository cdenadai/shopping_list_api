<?php

namespace App\BusinessRules\Admin\Tests\Controllers;

use Mockery;
use Illuminate\Http\Request;
use App\BusinessRules\Admin\Models\Admin;
use App\BusinessRules\Admin\Tests\AdminTestCase;
use App\BusinessRules\Admin\Contracts\IAdminUpdateService;
use App\BusinessRules\Admin\Controllers\AdminUpdateController;

class AdminUpdateControllerTest extends AdminTestCase
{
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();
        $updateForm = $this->validCreationFormWithoutLevel();

        $this->request = $this->mock(Request::class, function ($mock) use ($updateForm) {
            $mock->shouldReceive('all')->once()->andReturn($updateForm);
        });

        $this->service = $this->mock(IAdminUpdateService::class, function ($mock) {
            $mock->shouldReceive('update')->once()->andReturn(new Admin());
        });
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

	/** @test */
    public function should_return_ok_response_with_user()
    {
        $controller = new AdminUpdateController($this->service);

        $response = $controller->update(1, $this->request);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
