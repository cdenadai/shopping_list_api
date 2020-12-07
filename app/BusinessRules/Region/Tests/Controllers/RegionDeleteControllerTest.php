<?php

namespace App\BusinessRules\Region\Tests\Controllers;

use App\BusinessRules\Region\Contracts\IRegionDeleteService;
use App\BusinessRules\Region\Controllers\RegionDeleteController;
use App\BusinessRules\Region\Tests\RegionTestCase;
use Mockery;

class RegionDeleteControllerTest extends RegionTestCase
{
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->mock(IRegionDeleteService::class, function ($mock) {
            $mock->shouldReceive('delete')->once()->andReturn(true);
        });
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

	/** @test */
    public function should_return_ok_response()
    {
        $controller = new RegionDeleteController($this->service);

        $response = $controller->delete(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
