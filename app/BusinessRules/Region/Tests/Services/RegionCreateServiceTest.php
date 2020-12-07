<?php

namespace App\BusinessRules\Region\Tests\Services;

use App\BusinessRules\Region\Contracts\IRegionCreateValidator;
use App\BusinessRules\Region\Models\Region;
use App\BusinessRules\Region\Services\RegionCreateService;
use App\BusinessRules\Region\Tests\RegionTestCase;
use Mockery;

class RegionCreateServiceTest extends RegionTestCase
{
    protected $validator;
    protected $model;

    protected function setUp(): void
    {
        parent::setUp();

        $modelValidForm = $this->validCreationForm();
        $modelCreated = new Region();
        $modelCreated->fill($modelValidForm);
        $modelCreated->level = 'admin';

        $this->validator = $this->mock(IRegionCreateValidator::class, function ($mock) use ($modelValidForm) {
            $mock->shouldReceive('validate')->once()->andReturn($modelValidForm);
        });

        $this->model = $this->mock(Region::class, function ($mock) use ($modelCreated) {
            $mock->shouldReceive('create')->once()->andReturn($modelCreated);
        });
    }

    /** @test */
    public function should_create()
    {
        $modelData = $this->validCreationForm();

        $createService = new RegionCreateService($this->model, $this->validator);

        $model = $createService->create($modelData);

        $this->assertEquals('modelFieldValue', $model->field);

    }

}
