<?php

namespace App\BusinessRules\Region\Tests\Controllers;

use App\BusinessRules\Region\Contracts\IRegionUpdateService;
use App\BusinessRules\Region\Controllers\RegionUpdateController;
use App\BusinessRules\Region\Models\Region;
use App\BusinessRules\Region\Tests\RegionTestCase;
use Illuminate\Http\Request;
use Mockery;

class RegionUpdateControllerTest extends RegionTestCase
{
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();
        $updateForm = $this->validCreationForm();

        $this->request = $this->mock(Request::class, function ($mock) use ($updateForm) {
            $mock->shouldReceive('all')->once()->andReturn($updateForm);
        });

        $this->service = $this->mock(IRegionUpdateService::class, function ($mock) {
            $mock->shouldReceive('update')->once()->andReturn(new Region());
        });
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

	/** @test */
    public function should_return_ok_response()
    {
        $controller = new RegionUpdateController($this->service);

        $response = $controller->update(1, $this->request);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
