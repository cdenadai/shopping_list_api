<?php

namespace App\BusinessRules\Admin\Tests\Services;

use App\BusinessRules\Admin\Models\Admin;
use App\BusinessRules\Admin\Tests\AdminTestCase;
use App\BusinessRules\Admin\Services\AdminGetByIdService;

class AdminGetByIdServiceTest extends AdminTestCase
{
    protected $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adminUser = $this->makeFakeAdminUser();
    }

    /** @test */
    public function should_fail_if_dont_find()
    {
        $this->actingAs($this->adminUser);
        $this->expectException(\Throwable::class);
        $this->expectedExceptionCode = 400;

        $model = $this->mock(Admin::class, function ($mock) {
            $mock->shouldReceive('find')->once()->andThrow(\Throwable::class);
        });

        $getByIdService = new AdminGetByIdService($model);
        $getByIdService->getById($this->adminUser->id + 1);
    }

    /** @test */
    public function should_return_admin()
    {
        $this->actingAs($this->adminUser);
        $model = $this->mock(Admin::class, function ($mock) {
            $mock->shouldReceive('find')->once()->andReturn($this->adminUser);
        });

        $getByIdService = new AdminGetByIdService($model);
        $adminUser = $getByIdService->getById($this->adminUser->id);
        $this->assertEquals($adminUser, $this->adminUser);
    }
}
