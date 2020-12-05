<?php

namespace App\BusinessRules\Base\Services;

use Illuminate\Database\Eloquent\Model;
use App\BusinessRules\Base\Contracts\IValidator;
use App\BusinessRules\Base\Contracts\ICreateService;

class BaseCreateService implements ICreateService
{
    protected $model;
    protected $validator;

    public function __construct(
        Model $model,
        IValidator $validator
    )
    {
        $this->model = $model;
        $this->validator = $validator;
    }

    public function create(iterable $data) : object
    {
        try {
            $validated = $this->validator->validate($data);

            $created = $this->model->create($validated);
            if(!$created) throw new \Exception("Falha ao cadastrar registro", 400);

            return $created;

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
