<?php

namespace App\BusinessRules\Admin\Tests\Services;

use App\BusinessRules\Admin\Tests\AdminTestCase;

class AdminGetByIdServiceTest extends AdminTestCase
{
    protected $adminGetByIdService;
    protected $adminCreateService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adminGetByIdService = resolve('App\BusinessRules\Admin\Services\AdminGetByIdService');
        $this->adminCreateService = resolve('App\BusinessRules\Admin\Services\AdminCreateService');
    }

	/** @test */
    // public function should_be_logged_as_admin_to_see()
    // {
    //     $this->withoutExceptionHandling();
    // }

    /** @test */
    public function should_fail_if_dont_find()
    {
        $this->expectException(\Throwable::class);
        $this->expectedExceptionCode = 400;
        $admins = $this->adminGetByIdService->getById(1);
    }

    /** @test */
    public function should_return_admin()
    {
        $adminData = $this->validCreationFormWithoutLevel();

        $adminUser = $this->adminCreateService->create($adminData);

        $adminGetted = $this->actingAs($adminUser)->adminGetByIdService->getById($adminUser->id);
        $this->assertEquals($adminGetted->id, $adminUser->id);
    }
}
