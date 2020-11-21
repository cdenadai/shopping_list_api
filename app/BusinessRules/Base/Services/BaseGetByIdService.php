<?php

namespace App\BusinessRules\Base\Services;

use Illuminate\Database\Eloquent\Model;
use App\BusinessRules\Base\Contracts\IGetByIdService;

class BaseGetByIdService implements IGetByIdService
{
    protected $model;

    public function __construct(Model $model )
    {
        $this->model = $model;
    }

    public function getById(int $id) : object
    {
        try {
            return $this->model->find($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
