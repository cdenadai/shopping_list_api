<?php

namespace App\BusinessRules\Base\Services;

use App\BusinessRules\Base\Contracts\IDeleteService;
use App\BusinessRules\Base\Contracts\IGetByIdService;

class BaseDeleteService implements IDeleteService
{
    protected $getByIdService;

    public function __construct(IGetByIdService $getByIdService) {
        $this->getByIdService = $getByIdService;
    }

    public function delete(int $id) : bool
    {
        try {
            $model = $this->getByIdService->getById($id);

            return $model->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
