<?php

namespace App\BusinessRules\Admin\Tests;

use Tests\TestCase;

class AdminTestCase extends TestCase
{
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
