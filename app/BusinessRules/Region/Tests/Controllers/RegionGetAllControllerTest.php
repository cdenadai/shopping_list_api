<?php

namespace App\BusinessRules\Region\Tests\Controllers;

use App\BusinessRules\Region\Contracts\IRegionGetAllService;
use App\BusinessRules\Region\Controllers\RegionGetAllController;
use App\BusinessRules\Region\Tests\RegionTestCase;
use Mockery;

class RegionGetAllControllerTest extends RegionTestCase
{
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->mock(IRegionGetAllService::class, function ($mock) {
            $mock->shouldReceive('getAll')->once()->andReturn([]);
        });
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

	/** @test */
    public function should_return_ok_response()
    {
        $controller = new RegionGetAllController($this->service);

        $response = $controller->getAll();

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
