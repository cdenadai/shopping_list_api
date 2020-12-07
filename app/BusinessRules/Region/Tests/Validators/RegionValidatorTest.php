<?php

namespace App\BusinessRules\Region\Tests\Validators;

use App\BusinessRules\Region\Tests\RegionTestCase;
use Illuminate\Validation\ValidationException;

class RegionValidatorTest extends RegionTestCase
{
    protected $validator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->validator = resolve('App\BusinessRules\Region\Validators\RegionValidator');
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
        $modelData = [];

        $modelData[$formInput] = $formInputValue;
        $this->expectException(ValidationException::class);
        $this->validator->validate($modelData);

    }

    public function requiredFormValidationProvider()
    {
        return [
            ['field_1', ''],
            ['field_2', '']
        ];
    }

	/** @test */
    public function should_not_fails_valid_form()
    {
        $modelData =  [];

        $validated = $this->validator->validate($modelData);
        $this->assertEquals($validated, $modelData);
    }
}
