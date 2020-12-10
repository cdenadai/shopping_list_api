<?php

namespace App\BusinessRules\Region\Services;

use App\BusinessRules\Region\Contracts\IRegionCreateService;
use App\BusinessRules\Region\Contracts\IRegionValidator;
use App\BusinessRules\Region\Models\Region;

class RegionCreateService implements IRegionCreateService
{
    protected $model;
    protected $validator;

    public function __construct(Region $model, IRegionValidator $validator )
    {
        $this->model = $model;
        $this->validator = $validator;
    }

    public function create(iterable $data): object
    {
        try {
            $validated = $this->validator->validate($data);

            $created = $this->model->create($validated);
            if(!$created) throw new \Exception("Error Creating Registry", 400);

            return $created;

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
