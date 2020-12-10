<?php

namespace App\BusinessRules\Region\Tests\Services;

use App\BusinessRules\Region\Contracts\IRegionValidator;
use App\BusinessRules\Region\Services\RegionGetByIdService;
use App\BusinessRules\Region\Services\RegionUpdateService;
use App\BusinessRules\Region\Tests\RegionTestCase;

class RegionUpdateServiceTest extends RegionTestCase
{
    protected $modelInstance;
    protected $modelValidForm;
    protected $modelUpdateValidator;

    protected function setUp(): void
    {
        $this->modelValidForm = $this->validCreationForm();
        parent::setUp();
        $this->modelInstance = $this->makeFakeRegion();
    }

	/** @test */
    public function should_not_update_if_dont_exists()
    {
        $this->expectException(\Throwable::class);
        $this->expectedExceptionCode = 400;

        $getByIdService = $this->mock(RegionGetByIdService::class, function ($mock) {
            $mock->shouldReceive('getById')->once()->andThrow(\Throwable::class);
        });

        $this->modelUpdateValidator = $this->mock(IRegionValidator::class);

        $updateService = new RegionUpdateService($getByIdService, $this->modelUpdateValidator);
        $updateService->update($this->modelValidForm, $this->modelInstance->id);
    }

    /** @test */
    public function should_update()
    {
        $getByIdService = $this->mock(RegionGetByIdService::class, function ($mock) {
            $mock->shouldReceive('getById')->once()->andReturn($this->modelInstance);
        });

        $modelNewData['id'] = $this->modelInstance->id;
        $modelNewData['name'] = 'test';

        $this->modelUpdateValidator = $this->mock(IRegionValidator::class, function ($mock) use ($modelNewData){
            $mock->shouldReceive('validate')->once()->andReturn($modelNewData);
        });

        $updateService = new RegionUpdateService($getByIdService, $this->modelUpdateValidator);
        $updatedModel = $updateService->update($modelNewData, $this->modelInstance->id);

        $this->assertEquals($updatedModel->name, 'test');
    }

}
