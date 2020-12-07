<?php

namespace App\BusinessRules\AdminAuth\Tests\Validators;

use Illuminate\Validation\ValidationException;
use App\BusinessRules\AdminAuth\Tests\AdminAuthTestCase;

class AdminAuthSignInValidatorTest extends AdminAuthTestCase
{
    protected $validator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->validator = resolve('App\BusinessRules\AdminAuth\Validators\AdminAuthSignInValidator');
    }

    public function validSigninForm() {
        $adminUser =  $this->makeFakeAdminUser();

        return [
            'email' => $adminUser->email,
            'password' => 'password'
        ];
    }

    /**
    * @dataProvider requiredFormValidationProvider
    */
    public function test_validation_should_fails_with_invalid_form($formInput, $formInputValue)
    {
        $signinForm = $this->validSigninForm();

        $signinForm[$formInput] = $formInputValue;
        $this->expectException(ValidationException::class);
        $this->validator->validate($signinForm);

    }

    public function requiredFormValidationProvider()
    {
        return [
            ['email', ''],
            ['email', 'lorem-ipsum'],
            ['email', 'matilde72@waters.biz'],
            ['email', 'august.kautzer@kuphal.biz'],
            ['email', 'email@email'],
            ['email', 'email.com'],
            ['password', ''],
            ['password', '12'],
            ['password', '123456789012345678901']
        ];
    }

	/** @test */
    public function should_not_fails_valid_form()
    {
        $signinForm = $this->validSigninForm();
        $validated = $this->validator->validate($signinForm);

        $this->assertEquals($validated['email'], $signinForm['email']);
        $this->assertEquals($validated['password'], $signinForm['password']);
    }
}
