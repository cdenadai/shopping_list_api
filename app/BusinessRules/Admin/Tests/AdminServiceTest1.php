<?php

namespace App\BusinessRules\Admin\Tests;

use App\BusinessRules\Admin\Tests\AdminTestCase;
use Illuminate\Validation\ValidationException;

class AdminServiceTest1 extends AdminTestCase
{
    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = $this->instanceOfService();
    }

	/** @test */
    public function should_create()
    {
        $modelData = $this->validCreationFormWithoutLevel();

        $createdModel = $this->service->create($modelData);
        $this->assertEquals($createdModel->level, 'admin');
    }

    /** @test */
    public function should_update()
    {
        $modelData = $this->validCreationFormWithoutLevel();

        $adminUser = $this->service->create($modelData);

        $modelData['name'] = 'admin Updated User';
        $modelData['level'] = 'admin';

        $adminUpdatedUser = $this->service->update($modelData, $adminUser->id);
        $this->assertEquals($adminUpdatedUser->name,  'admin Updated User');
    }

    /** @test */
    public function should_return_user()
    {
        $modelData = $this->validCreationFormWithoutLevel();

        $adminUserCreated = $this->service->create($modelData);

        $adminUserGetted = $this->service->getById($adminUserCreated->id);

        $this->assertEquals($adminUserCreated->email, $adminUserGetted->email);
        $this->assertEquals($adminUserCreated->name, $adminUserGetted->name);
        $this->assertEquals($adminUserCreated->id, $adminUserGetted->id);
        $this->assertEquals($adminUserCreated->level, $adminUserGetted->level);
    }

    // /** @test */
    // public function shouldnt_delete_if_dont_exists()
    // {
    //     $modelData = $this->validCreationFormWithLevel();

    //     $adminUserCreated = $this->service->create($modelData);

    //     $this->expectException(\Exception::class);
    //     $this->expectExceptionCode = 400;

    //     $deleted = $this->service->delete($adminUserCreated->id + 1);
    // }

    // /** @test */
    // public function should_delete()
    // {
    //     $modelData = $this->validCreationFormWithLevel();

    //     $adminUserCreated = $this->service->create($modelData);

    //     $deleted = $this->service->delete($adminUserCreated->id);
    //     $this->assertDatabaseMissing('users', ['id' => $adminUserCreated->id]);
    // }
}
