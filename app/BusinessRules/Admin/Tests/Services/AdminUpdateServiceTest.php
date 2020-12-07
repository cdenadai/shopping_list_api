<?php

namespace App\BusinessRules\Admin\Tests\Services;

use App\BusinessRules\Admin\Tests\AdminTestCase;
use App\BusinessRules\Admin\Services\AdminUpdateService;
use App\BusinessRules\Admin\Services\AdminGetByIdService;
use App\BusinessRules\Admin\Contracts\IAdminUpdateValidator;

class AdminUpdateServiceTest extends AdminTestCase
{
    protected $adminUser;
    protected $adminValidForm;
    protected $adminUpdateValidator;

    protected function setUp(): void
    {
        $this->adminValidForm = $this->validCreationFormWithoutLevel();
        parent::setUp();
        $this->adminUser = $this->makeFakeAdminUser();
    }

	/** @test */
    public function should_not_update_if_user_dont_exists()
    {
        $this->actingAs($this->adminUser);
        $this->expectException(\Throwable::class);
        $this->expectedExceptionCode = 400;

        $getByIdService = $this->mock(AdminGetByIdService::class, function ($mock) {
            $mock->shouldReceive('getById')->once()->andThrow(\Throwable::class);
        });

        $this->adminUpdateValidator = $this->mock(IAdminUpdateValidator::class);

        $updateService = new AdminUpdateService($getByIdService, $this->adminUpdateValidator);
        $updateService->update($this->adminValidForm, $this->adminuser->id);
    }

    /** @test */
    public function should_update()
    {
        $this->actingAs($this->adminUser);

        $getByIdService = $this->mock(AdminGetByIdService::class, function ($mock) {
            $mock->shouldReceive('getById')->once()->andReturn($this->adminUser);
        });

        $adminNewData['id'] = $this->adminUser->id;
        $adminNewData['name'] = 'User for tests';
        $adminNewData['email'] = 'teste@teste.com';

        $this->adminUpdateValidator = $this->mock(IAdminUpdateValidator::class, function ($mock) use ($adminNewData){
            $mock->shouldReceive('validate')->once()->andReturn($adminNewData);
        });

        $updateService = new AdminUpdateService($getByIdService, $this->adminUpdateValidator);
        $updatedModel = $updateService->update($adminNewData, $this->adminUser->id);

        $this->assertEquals($updatedModel->name, 'User for tests');
    }

}
