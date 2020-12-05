<?php

namespace App\BusinessRules\DummyModel\Tests\Services;

use App\BusinessRules\DummyModel\Tests\DummyModelTestCase;

class DummyModelGetByIdServiceTest extends DummyModelTestCase
{
    protected $modelGetByIdService;
    protected $modelCreateService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->modelGetByIdService = resolve('App\BusinessRules\DummyModel\Services\DummyModelGetByIdService');
        $this->modelCreateService = resolve('App\BusinessRules\DummyModel\Services\DummyModelCreateService');
    }

    /** @test */
    public function should_fail_if_dont_find()
    {
        $this->expectException(\Throwable::class);
        $this->expectedExceptionCode = 400;
        $models = $this->modelGetByIdService->getById(1);
    }

    /** @test */
    public function should_return_model()
    {
        $modelData = [$this->validCreationFormWithoutLevel()];

        $modelUser = $this->modelCreateService->create($modelData);

        $modelGetted = $this->actingAs($modelUser)->modelGetByIdService->getById($modelUser->id);
        $this->assertEquals($modelGetted->id, $modelUser->id);
    }
}
