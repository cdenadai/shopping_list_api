<?php

namespace App\BusinessRules\Admin\Validators;

use App\BusinessRules\Base\Validators\BaseValidator;
use App\BusinessRules\Admin\Contracts\IAdminCreateValidator;

class AdminCreateValidator extends BaseValidator implements IAdminCreateValidator
{
    public static function getRules(): iterable
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email:filter|unique:users,email',
            'password' => 'required|min:8|max:20'
        ];
    }

    public function validate(iterable $data): iterable
    {
        $this->setRules();
        return parent::validate($data);
    }

    public function setRules(): void
    {
        $rules = $this->getRules();

        $rules['secret'] =  [
            'required',
            function ($attribute, $value, $fail) {
                if ($value !== env('APP_SECRET_KEY')) {
                    $fail($attribute.' value is invalid.');
                }
            },
        ];

        $this->rules = $rules;
    }
}

