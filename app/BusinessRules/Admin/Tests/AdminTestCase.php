<?php

namespace App\BusinessRules\Admin\Tests;

use Mockery;
use Tests\TestCase;
use App\Models\User;
use App\BusinessRules\Admin\Models\Admin;

class AdminTestCase extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function makeFakeAdminUser()
    {
        return Admin::factory()->count(1)->create()->first();
    }

    public function makeFakeOperatorUser()
    {
        return User::factory()->state(['level' => 'operator'])->count(1)->create()->first();
    }

    public function validCreationFormWithoutLevel()
    {
        return [
            'name' => 'adminTestUser',
            'email' => 'admin@test.com',
            'password' => '12345678',
            'secret' => '1234'
        ];
    }

    public function validUpdateFormWithoutLevel()
    {
        return [
            'id' => '1',
            'name' => 'adminTestUser',
            'email' => 'admin@test.com'
        ];
    }

    public function validCreationFormWithLevel()
    {
        return [
            'name' => 'adminTestUser',
            'email' => 'admin@test.com',
            'password' => '12345678',
            'secret' => '1234',
            'level' => 'admin'
        ];
    }

    public function validUpdateFormWithLevel()
    {
        return [
            'id' => '1',
            'name' => 'adminTestUser',
            'email' => 'admin@test.com',
            'level' => 'admin'
        ];
    }
}
