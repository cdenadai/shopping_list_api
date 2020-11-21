<?php

namespace App\BusinessRules\Base\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\BusinessRules\Base\Contracts\IValidator;

abstract class BaseValidator extends Validator implements IValidator
{
    protected $rules;

    public function __construct()
    {
        $this->rules = $this->getRules();
    }

    public function validate(iterable $data) : iterable
    {
        $validation = parent::make($data, $this->rules);

        if ($validation->fails()) {
            throw new ValidationException($validation->errors());
        }

        return $validation->validated();
    }

    public abstract static function getRules() : iterable;
}
