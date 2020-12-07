<?php

namespace App\BusinessRules\Admin\Tests\Services;

use Throwable;
use App\BusinessRules\Admin\Tests\AdminTestCase;
use App\BusinessRules\Admin\Services\AdminDeleteService;
use App\BusinessRules\Admin\Contracts\IAdminGetByIdService;

class AdminDeleteServiceTest extends AdminTestCase
{
    protected $model;
    protected $adminUser;
    protected $adminGetByIdService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adminUser = $this->makeFakeAdminUser();
    }

	/** @test */
    public function should_not_delete_if_user_dont_exists()
    {
        $this->actingAs($this->adminUser);
        $this->expectException(\Throwable::class);

        $adminGetByIdService = $this->mock(IAdminGetByIdService::class, function ($mock) {
            $mock->shouldReceive('getById')->once()->andThrow(new Throwable());
        });

        $deleteService = new AdminDeleteService($adminGetByIdService);
        $deleteService->delete($this->adminUser + 1);
    }

    /** @test */
    public function should_delete()
    {
        $adminGetByIdService = $this->mock(IAdminGetByIdService::class, function ($mock) {
            $mock->shouldReceive('getById')->once()->andReturn($this->adminUser);
        });

        $this->actingAs($this->adminUser);
        $deleteService = new AdminDeleteService($adminGetByIdService);
        $couldDelete = $deleteService->delete($this->adminUser->id);
        $this->assertTrue($couldDelete);
    }

}
