<?php

namespace App\BusinessRules\Region\Tests\Services;

use App\BusinessRules\Region\Models\Region;
use App\BusinessRules\Region\Services\RegionGetByIdService;
use App\BusinessRules\Region\Tests\RegionTestCase;

class RegionGetByIdServiceTest extends RegionTestCase
{
    protected $modelInstance;

    protected function setUp(): void
    {
        parent::setUp();
        $this->modelInstance = $this->makeFakeRegion();
    }

    /** @test */
    public function should_fail_if_dont_find()
    {
        $this->expectException(\Throwable::class);
        $this->expectedExceptionCode = 400;

        $model = $this->mock(Region::class, function ($mock) {
            $mock->shouldReceive('find')->once()->andThrow(\Throwable::class);
        });

        $getByIdService = new RegionGetByIdService($model);
        $getByIdService->getById($this->modelInstance->id + 1);
    }

    /** @test */
    public function should_return_model()
    {
        $model = $this->mock(Region::class, function ($mock) {
            $mock->shouldReceive('find')->once()->andReturn($this->modelInstance);
        });

        $getByIdService = new RegionGetByIdService($model);
        $modelInstance = $getByIdService->getById($this->modelInstance->id);
        $this->assertEquals($modelInstance, $this->modelInstance);
    }
}
