<?php

namespace App\BusinessRules\Region\Tests\Controllers;

use App\BusinessRules\Region\Contracts\IRegionGetByIdService;
use App\BusinessRules\Region\Controllers\RegionGetByIdController;
use App\BusinessRules\Region\Models\Region;
use App\BusinessRules\Region\Tests\RegionTestCase;
use Mockery;

class RegionGetByIdControllerTest extends RegionTestCase
{
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->mock(IRegionGetByIdService::class, function ($mock) {
            $mock->shouldReceive('getById')->once()->andReturn(new Region());
        });
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

	/** @test */
    public function should_return_ok_response()
    {
        $controller = new RegionGetByIdController($this->service);

        $response = $controller->getById(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
