<?php

namespace App\BusinessRules\Admin\Tests\Services;

use App\BusinessRules\Admin\Tests\AdminTestCase;

class AdminUpdateServiceTest extends AdminTestCase
{
    protected $createService;
    protected $updateService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->createService = resolve('App\BusinessRules\Admin\Services\AdminCreateService');
        $this->updateService = resolve('App\BusinessRules\Admin\Services\AdminUpdateService');
    }

	/** @test */
    public function should_not_update_if_user_dont_exists()
    {
        $adminData = $this->validCreationFormWithoutLevel();

        $this->expectException(\Throwable::class);

        $this->updateService->update($adminData, 1);
    }

    /** @test */
    public function should_update()
    {
        $adminData = $this->validCreationFormWithoutLevel();

        $admin = $this->createService->create($adminData);

        $adminData['id'] = $admin->id;
        $adminData['name'] = 'User for tests';
        $adminData['email'] = 'teste@teste.com';

        $updatedUser = $this->actingAs($admin)->updateService->update($adminData, $admin->id);
        $this->assertEquals($updatedUser->name, 'User for tests');
    }

}
