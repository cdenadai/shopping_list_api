<?php

namespace App\BusinessRules\Admin\Validators;

use Illuminate\Validation\Rule;
use App\BusinessRules\Base\Validators\BaseValidator;
use App\BusinessRules\Admin\Contracts\IAdminUpdateValidator;

class AdminUpdateValidator extends BaseValidator implements IAdminUpdateValidator
{
    public static function getRules(): iterable
    {
        return [
            'id' => ['required'],
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email:rfc,strict,dns', 'unique:users,email']
        ];
    }

    public function validate(iterable $data): iterable
    {
        if(isset($data['id'])) {
            $this->setRules(['id' => $data['id']]);
        }

        return parent::validate($data);
    }

    public function setRules($params): void
    {
        $rules = $this->getRules();

        array_push($rules['email'], Rule::unique('users', 'email_address')->ignore($params['id']),);

        $this->rules = $rules;
    }
}

