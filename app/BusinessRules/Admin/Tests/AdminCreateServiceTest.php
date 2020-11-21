<?php

namespace App\BusinessRules\Admin\Tests;

use App\BusinessRules\Admin\Tests\AdminTestCase;

class AdminCreateServiceTest extends AdminTestCase
{
    protected $createService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->createService = resolve('App\BusinessRules\Admin\Services\AdminCreateService');
    }

    /** @test */
    public function should_create_with_admin_level()
    {
        $adminData = $this->validCreationFormWithoutLevel();

        $admin = $this->createService->create($adminData);

        $this->assertEquals('admin', $admin->level);

    }

}
