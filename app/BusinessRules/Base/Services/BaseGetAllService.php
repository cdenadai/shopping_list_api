<?php

namespace App\BusinessRules\Base\Services;

use Illuminate\Database\Eloquent\Model;
use App\BusinessRules\Base\Contracts\IGetAllService;

class BaseGetAllService implements IGetAllService
{
    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function getAll() : iterable
    {
        try {
            return $this->model->all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
