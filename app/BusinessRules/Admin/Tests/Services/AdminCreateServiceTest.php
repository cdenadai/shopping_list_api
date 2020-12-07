<?php

namespace App\BusinessRules\Admin\Tests\Services;

use Mockery;
use App\BusinessRules\Admin\Models\Admin;
use App\BusinessRules\Admin\Tests\AdminTestCase;
use App\BusinessRules\Admin\Services\AdminCreateService;
use App\BusinessRules\Admin\Contracts\IAdminCreateValidator;

class AdminCreateServiceTest extends AdminTestCase
{
    protected $validator;
    protected $model;

    protected function setUp(): void
    {
        parent::setUp();

        $adminValidForm = $this->validCreationFormWithoutLevel();
        $adminCreatedUser = new Admin();
        $adminCreatedUser->fill($adminValidForm);
        $adminCreatedUser->level = 'admin';

        $this->validator = $this->mock(IAdminCreateValidator::class, function ($mock) use ($adminValidForm) {
            $mock->shouldReceive('validate')->once()->andReturn($adminValidForm);
        });

        $this->model = $this->mock(Admin::class, function ($mock) use ($adminCreatedUser) {
            $mock->shouldReceive('create')->once()->andReturn($adminCreatedUser);
        });
    }

    /** @test */
    public function should_create_with_admin_level()
    {
        $adminData = $this->validCreationFormWithoutLevel();

        $createService = new AdminCreateService($this->model, $this->validator);

        $admin = $createService->create($adminData);

        $this->assertEquals('admin', $admin->level);

    }

}
