<?php

namespace App\BusinessRules\Region\Services;

use App\BusinessRules\Region\Contracts\IRegionDeleteService;
use App\BusinessRules\Region\Contracts\IRegionGetByIdService;

class RegionDeleteService implements IRegionDeleteService
{
    protected $modelGetByIdService;

    public function __construct(IRegionGetByIdService $modelGetByIdService)
    {
        $this->modelGetByIdService = $modelGetByIdService;
    }

    public function delete(int $id): bool
    {
        try {
            $model = $this->modelGetByIdService->getById($id);
            return $model->delete($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
