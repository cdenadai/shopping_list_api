<?php

namespace App\BusinessRules\Region\Tests\Services;

use App\BusinessRules\Region\Models\Region;
use App\BusinessRules\Region\Services\RegionGetAllService;
use App\BusinessRules\Region\Tests\RegionTestCase;
use Throwable;

class RegionGetAllServiceTest extends RegionTestCase
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

        $admin = $this->mock(Region::class, function ($mock) {
            $mock->shouldReceive('all')->once()->andThrow(new Throwable());
        });

        $getAllService = new RegionGetAllService($admin);
        $getAllService->getAll();
    }

    /** @test */
    public function should_return_admins()
    {
        $model = $this->mock(Region::class, function ($mock) {
            $mock->shouldReceive('all')->once()->andReturn(array($this->modelInstance));
        });

        $getAllService = new RegionGetAllService($model);
        $modelInstances = $getAllService->getAll();

        $this->assertCount(1, $modelInstances);
    }
}
