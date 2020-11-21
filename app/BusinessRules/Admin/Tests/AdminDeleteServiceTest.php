<?php

namespace App\BusinessRules\Admin\Tests;

use App\BusinessRules\Admin\Tests\AdminTestCase;

class AdminDeleteServiceTest extends AdminTestCase
{
    protected $createService;
    protected $deleteService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->createService = resolve('App\BusinessRules\Admin\Services\AdminCreateService');
        $this->deleteService = resolve('App\BusinessRules\Admin\Services\AdminDeleteService');
    }

	/** @test */
    public function should_not_delete_if_user_dont_exists()
    {
        $adminData = $this->validCreationFormWithoutLevel();

        $this->expectException(\Throwable::class);

        $this->deleteService->delete(1);
    }

    /** @test */
    public function should_delete()
    {
        $adminData = $this->validCreationFormWithoutLevel();

        $admin = $this->createService->create($adminData);

        $deletedUser = $this->actingAs($admin)->deleteService->delete($admin->id);
        $this->assertTrue($deletedUser);
    }

}
