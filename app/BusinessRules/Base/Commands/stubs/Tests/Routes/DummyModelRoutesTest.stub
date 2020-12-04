<?php

namespace App\BusinessRules\DummyModel\Tests\Routes;

use App\BusinessRules\DummyModel\Tests\DummyModelTestCase;

class DummyModelRoutesTest extends DummyModelTestCase
{
    protected $baseURL;

    protected function setUp(): void
    {
        parent::setUp();
        $this->baseURL = env('APP_URL');
    }

	/** @test */
    public function should_exist_create_route(){
        $route = route('model.create');
        $this->assertEquals($this->baseURL.'/api/model', $route);
    }

	/** @test */
    public function should_exist_update_route(){
        $route = route('model.update', 1);
        $this->assertEquals($this->baseURL.'/api/model/1', $route);
    }

	/** @test */
    public function should_exist_getAll_route(){
        $route = route('model.getAll');
        $this->assertEquals($this->baseURL.'/api/model', $route);
    }

	/** @test */
    public function should_exist_getById_route(){
        $route = route('model.getById', 1);
        $this->assertEquals($this->baseURL.'/api/model/1', $route);
    }
	/** @test */
    public function should_exist_Delete_route(){
        $route = route('model.delete', 1);
        $this->assertEquals($this->baseURL.'/api/model/1', $route);
    }
}
