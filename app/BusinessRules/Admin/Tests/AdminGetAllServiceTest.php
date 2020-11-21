<?php

namespace App\BusinessRules\Admin\Tests;

use App\BusinessRules\Admin\Tests\AdminTestCase;

class AdminGetAllServiceTest extends AdminTestCase
{
    protected $adminGetAllService;
    protected $adminCreateService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adminGetAllService = resolve('App\BusinessRules\Admin\Services\AdminGetAllService');
        $this->adminCreateService = resolve('App\BusinessRules\Admin\Services\AdminCreateService');
    }

	/** @test */
    // public function should_be_logged_as_admin_to_see()
    // {
    //     $this->withoutExceptionHandling();
    // }

    /** @test */
    public function should_fail_if_dont_find_admins()
    {
        $this->expectException(\Throwable::class);
        $this->expectedExceptionCode = 400;
        $admins = $this->adminGetAllService->getAll();
    }

    /** @test */
    public function should_return_admins()
    {
        $adminData = $this->validCreationFormWithoutLevel();

        $adminUser = $this->adminCreateService->create($adminData);

        $admins = $this->actingAs($adminUser)->adminGetAllService->getAll();
        $this->assertCount(1, $admins);
    }
}
