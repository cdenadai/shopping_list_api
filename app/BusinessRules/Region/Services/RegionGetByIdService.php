<?php

namespace App\BusinessRules\Region\Services;

use App\BusinessRules\Region\Contracts\IRegionGetByIdService;
use App\BusinessRules\Region\Models\Region;

class RegionGetByIdService implements IRegionGetByIdService
{
    protected $model;

    public function __construct(Region $model) {
        $this->model = $model;
    }

    public function getById(int $id): object
    {
        try {
            return $this->model->find($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
