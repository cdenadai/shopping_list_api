<?php

namespace App\BusinessRules\DummyModel\Tests\Services;

use App\BusinessRules\DummyModel\Tests\DummyModelTestCase;

class DummyModelDeleteServiceTest extends DummyModelTestCase
{
    protected $createService;
    protected $deleteService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->createService = resolve('App\BusinessRules\DummyModel\Services\DummyModelCreateService');
        $this->deleteService = resolve('App\BusinessRules\DummyModel\Services\DummyModelDeleteService');
    }

	/** @test */
    public function should_not_delete_if_dont_exists()
    {
        $this->expectException(\Throwable::class);
        $this->deleteService->delete(1);
    }

    /** @test */
    public function should_delete()
    {
        $modelData = [];

        $model = $this->createService->create($modelData);

        $deletedModel = $this->actingAs($model)->deleteService->delete($model->id);
        $this->assertTrue($deletedModel);
    }

}
