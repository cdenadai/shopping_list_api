<?php

namespace App\BusinessRules\Admin\Tests\E2E;

use Tests\TestCase;

class CreateAdminTest1 extends TestCase
{
    /**
     * @dataProvider requiredFormValidationProvider
     * Este teste funciona da seguinte forma.
     * Será tentado inserir um usuário com cada um dos campos vazios
     * O validador deverá retornar a mensagem indicando que o campo gerou falha
     * em cada tentativa com o requiredFormValidationProvider
     */
    public function test_should_fail($formInput, $formInputValue)
    {
        $this->post('/api/admin', [$formInput => $formInputValue])
        ->assertStatus(422)
        ->assertSee($formInput);
    }

    public function requiredFormValidationProvider()
    {
        return [
            ['name', ''],
            ['email', ''],
            ['email', 'lorem-ipsum'],
            ['email', 'email@email'],
            ['email', 'email.com'],
            ['password', ''],
            ['password', '1234567'],
            ['password', '123456789012345678901'],
            ['secret', ''],
            ['secret', '123']
        ];
    }

	/** @test */
    public function should_create()
    {
        $data = [
            'name' => 'adminTestUser',
            'email' => 'admin@test.com',
            'password' => '12345678',
            'secret' => '1234',
        ];

        $response = $this->post('/api/admin', $data);

        $response->assertCreated()
            ->assertJson([
                'name' => 'adminTestUser',
                'email' => 'admin@test.com',
                'level' => 'admin'
            ])
            ->assertJsonMissing([
                'password' => '12345678',
                'secret' => '1234',
            ]);
    }
}
