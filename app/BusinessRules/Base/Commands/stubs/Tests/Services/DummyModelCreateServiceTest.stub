<?php

namespace App\BusinessRules\DummyModel\Tests\Services;

use App\BusinessRules\DummyModel\Tests\DummyModelTestCase;

class DummyModelCreateServiceTest extends DummyModelTestCase
{
    protected $createService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->createService = resolve('App\BusinessRules\DummyModel\Services\DummyModelCreateService');
    }

    /** @test */
    public function should_create()
    {
        $modelData = [];

        $model = $this->createService->create($modelData);

        $this->assertEquals('model', $model->level);

    }

}
