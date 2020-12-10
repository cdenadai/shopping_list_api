<?php

namespace App\BusinessRules\Region\Tests\Routes;

use App\BusinessRules\Region\Tests\RegionTestCase;

class RegionRoutesTest extends RegionTestCase
{
    protected $baseURL;

    protected function setUp(): void
    {
        parent::setUp();
        $this->baseURL = env('APP_URL');
    }

	/** @test */
    public function should_exist_create_route(){
        $route = route('regions.create');
        $this->assertEquals($this->baseURL.'/api/admin/regions', $route);
    }

	/** @test */
    public function should_exist_update_route(){
        $route = route('regions.update', 1);
        $this->assertEquals($this->baseURL.'/api/admin/regions/1', $route);
    }

	/** @test */
    public function should_exist_getAll_route(){
        $route = route('regions.getAll');
        $this->assertEquals($this->baseURL.'/api/admin/regions', $route);
    }

	/** @test */
    public function should_exist_getById_route(){
        $route = route('regions.getById', 1);
        $this->assertEquals($this->baseURL.'/api/admin/regions/1', $route);
    }
	/** @test */
    public function should_exist_Delete_route(){
        $route = route('regions.delete', 1);
        $this->assertEquals($this->baseURL.'/api/admin/regions/1', $route);
    }
}
