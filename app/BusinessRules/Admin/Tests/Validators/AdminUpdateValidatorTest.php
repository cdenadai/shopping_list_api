<?php

namespace App\BusinessRules\Admin\Tests\Validators;

use App\BusinessRules\Admin\Models\Admin;
use Illuminate\Validation\ValidationException;
use App\BusinessRules\Admin\Tests\AdminTestCase;

class AdminUpdateValidatorTest extends AdminTestCase
{
    protected $validator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->validator = resolve('App\BusinessRules\Admin\Validators\AdminUpdateValidator');
    }
    /**
     * @dataProvider requiredFormValidationProvider
     * Este teste funciona da seguinte forma.
     * Será tentado inserir um usuário com cada um dos campos vazios
     * O validador deverá retornar a mensagem indicando que o campo gerou falha
     * em cada tentativa com o requiredFormValidationProvider
     */
    public function test_validation_should_fails_with_invalid_form($formInput, $formInputValue)
    {
        $adminData = $this->validCreationFormWithoutLevel();

        $adminData[$formInput] = $formInputValue;
        $this->expectException(ValidationException::class);
        $this->validator->validate($adminData);

    }

    public function requiredFormValidationProvider()
    {
        return [
            ['name', ''],
            ['email', ''],
            ['email', 'lorem-ipsum'],
            ['email', 'email@email'],
            ['email', 'email.com'],
        ];
    }

	/** @test */
    public function should_not_fails_valid_form()
    {
        $adminData =  $this->validUpdateFormWithoutLevel();

        $validated = $this->validator->validate($adminData);
        $this->assertEquals($validated['name'], $adminData['name']);
        $this->assertEquals($validated['email'], $adminData['email']);
    }

	/** @test */
    public function should_fail_with_duplicated_email()
    {
        $adminData =  $this->validCreationFormWithLevel();

        $this->expectException(ValidationException::class);
        Admin::create($adminData);
        $this->validator->validate($adminData);
    }
}
