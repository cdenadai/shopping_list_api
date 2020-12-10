<?php

namespace App\BusinessRules\Region\Tests\Controllers;

use App\BusinessRules\Region\Contracts\IRegionCreateService;
use App\BusinessRules\Region\Controllers\RegionCreateController;
use App\BusinessRules\Region\Models\Region;
use App\BusinessRules\Region\Tests\RegionTestCase;
use Illuminate\Http\Request;
use Mockery;

class RegionCreateControllerTest extends RegionTestCase
{
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();
        $createForm = $this->validCreationForm();

        $this->request = $this->mock(Request::class, function ($mock) use ($createForm) {
            $mock->shouldReceive('all')->once()->andReturn($createForm);
        });

        $this->service = $this->mock(IRegionCreateService::class, function ($mock) {
            $mock->shouldReceive('create')->once()->andReturn(new Region());
        });
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

	/** @test */
    public function should_return_created_response()
    {
        $controller = new RegionCreateController($this->service);

        $response = $controller->create($this->request);

        $this->assertEquals($response->getStatusCode(), 201);
    }
}
