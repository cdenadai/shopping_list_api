<?php

namespace App\BusinessRules\Region\Services;

use App\BusinessRules\Region\Contracts\IRegionGetAllService;
use App\BusinessRules\Region\Models\Region;

class RegionGetAllService implements IRegionGetAllService
{
    protected $model;

    public function __construct(Region $model) {
        $this->model = $model;
    }

    public function getAll(): iterable
    {
        try {
            $models = $this->model->all();
            if(count($models) <= 0) throw new \Exception("Nothing founded", 400);

            return $models;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
