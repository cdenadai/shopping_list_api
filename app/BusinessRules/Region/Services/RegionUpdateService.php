<?php

namespace App\BusinessRules\Region\Services;

use App\BusinessRules\Region\Contracts\IRegionGetByIdService;
use App\BusinessRules\Region\Contracts\IRegionUpdateService;
use App\BusinessRules\Region\Contracts\IRegionValidator;

class RegionUpdateService implements IRegionUpdateService
{
    protected $modelGetByIdService;
    protected $validator;

    public function __construct(
        IRegionGetByIdService $modelGetByIdService,
        IRegionValidator $validator
    )
    {
        $this->modelGetByIdService = $modelGetByIdService;
        $this->validator = $validator;
    }

    public function update(iterable $data, int $id): object
    {
        try {
            $validated = $this->validator->validate($data);

            $model = $this->modelGetByIdService->getById($id);

            $updated = $model->update($validated);
            if(!$updated) throw new \Exception("Error Updating", 400);

            return $model;

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
