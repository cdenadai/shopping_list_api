<?php

namespace App\BusinessRules\Admin\Tests\Services;

use Throwable;
use App\BusinessRules\Admin\Models\Admin;
use App\BusinessRules\Admin\Services\AdminGetAllService;
use App\BusinessRules\Admin\Tests\AdminTestCase;

class AdminGetAllServiceTest extends AdminTestCase
{
    protected $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adminUser = $this->makeFakeAdminUser();
    }

    /** @test */
    public function should_fail_if_dont_find_admins()
    {
        $this->actingAs($this->adminUser);
        $this->expectException(\Throwable::class);
        $this->expectedExceptionCode = 400;

        $admin = $this->mock(Admin::class, function ($mock) {
            $mock->shouldReceive('all')->once()->andThrow(new Throwable());
        });

        $getAllService = new AdminGetAllService($admin);
        $getAllService->getAll();
    }

    /** @test */
    public function should_return_admins()
    {
        $this->actingAs($this->adminUser);

        $model = $this->mock(Admin::class, function ($mock) {
            $mock->shouldReceive('all')->once()->andReturn(array($this->adminUser));
        });

        $getAllService = new AdminGetAllService($model);
        $adminUsers = $getAllService->getAll();

        $this->assertCount(1, $adminUsers);
    }
}
