<?php

namespace App\BusinessRules\DummyModel\Tests\Services;

use App\BusinessRules\DummyModel\Tests\DummyModelTestCase;

class DummyModelGetAllServiceTest extends DummyModelTestCase
{
    protected $modelGetAllService;
    protected $modelCreateService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->modelGetAllService = resolve('App\BusinessRules\DummyModel\Services\DummyModelGetAllService');
        $this->modelCreateService = resolve('App\BusinessRules\DummyModel\Services\DummyModelCreateService');
    }

	/** @test */
    // public function should_be_logged_as_model_to_see()
    // {
    //     $this->withoutExceptionHandling();
    // }

    /** @test */
    public function should_fail_if_dont_find_models()
    {
        $this->expectException(\Throwable::class);
        $this->expectedExceptionCode = 400;
        $models = $this->modelGetAllService->getAll();
    }

    /** @test */
    public function should_return_models()
    {
        $modelData = [];
        $modelUser = new User();

        $model = $this->modelCreateService->create($modelData);

        $models = $this->actingAs($modelUser)->modelGetAllService->getAll();
        $this->assertCount(1, $models);
    }
}
