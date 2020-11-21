<?php

namespace App\BusinessRules\Base\Services;

use App\BusinessRules\Base\Contracts\IValidator;
use App\BusinessRules\Base\Contracts\IUpdateService;
use App\BusinessRules\Base\Contracts\IGetByIdService;

class BaseUpdateService implements IUpdateService
{
    protected $getByIdService;
    protected $validator;

    public function __construct(IGetByIdService $getByIdService, IValidator $validator)
    {
        $this->getByIdService = $getByIdService;
        $this->validator = $validator;
    }

    public function update(iterable $data, int $id) : object
    {
        try {
            $validated = $this->validator->validate($data);

            $model = $this->getByIdService->getById($id);

            $updated = $model->update($validated);
            if(!$updated) throw new \Exception("Error Updating", 400);

            return $updated;

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
