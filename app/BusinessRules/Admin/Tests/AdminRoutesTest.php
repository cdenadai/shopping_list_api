<?php

namespace App\BusinessRules\Admin\Tests;

use App\BusinessRules\Admin\Tests\AdminTestCase;

class AdminRoutesTest extends AdminTestCase
{
    protected $baseURL;

    protected function setUp(): void
    {
        parent::setUp();
        $this->baseURL = env('APP_URL');
    }

	/** @test */
    public function should_exist_create_route(){
        $route = route('admin.create');
        $this->assertEquals($this->baseURL.'/api/admin', $route);
    }

	/** @test */
    public function should_exist_update_route(){
        $route = route('admin.update', 1);
        $this->assertEquals($this->baseURL.'/api/admin/1', $route);
    }

	/** @test */
    public function should_exist_getAll_route(){
        $route = route('admin.getAll');
        $this->assertEquals($this->baseURL.'/api/admin', $route);
    }

	/** @test */
    public function should_exist_getById_route(){
        $route = route('admin.getById', 1);
        $this->assertEquals($this->baseURL.'/api/admin/1', $route);
    }
	/** @test */
    public function should_exist_Delete_route(){
        $route = route('admin.delete', 1);
        $this->assertEquals($this->baseURL.'/api/admin/1', $route);
    }
}
