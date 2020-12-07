<?php

namespace App\BusinessRules\Region\Tests\Services;

use App\BusinessRules\Region\Contracts\IRegionGetByIdService;
use App\BusinessRules\Region\Services\RegionDeleteService;
use App\BusinessRules\Region\Tests\RegionTestCase;
use Throwable;

class RegionDeleteServiceTest extends RegionTestCase
{
    protected $model;
    protected $modelInstance;
    protected $modelGetByIdService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->modelInstance = $this->makeFakeRegion();
    }

	/** @test */
    public function should_not_delete_if_dont_exists()
    {
        $this->expectException(\Throwable::class);

        $modelGetByIdService = $this->mock(IRegionGetByIdService::class, function ($mock) {
            $mock->shouldReceive('getById')->once()->andThrow(new Throwable());
        });

        $deleteService = new RegionDeleteService($modelGetByIdService);
        $deleteService->delete($this->modelInstance->id + 1);
    }

    /** @test */
    public function should_delete()
    {
        $modelGetByIdService = $this->mock(IRegionGetByIdService::class, function ($mock) {
            $mock->shouldReceive('getById')->once()->andReturn($this->modelInstance);
        });

        $deleteService = new RegionDeleteService($modelGetByIdService);
        $deleted = $deleteService->delete($this->modelInstance->id);
        $this->assertTrue($deleted);
    }

}
