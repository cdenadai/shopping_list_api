<?php

namespace  App\BusinessRules\Admin\Services;

use App\BusinessRules\Admin\Gates\AdminGate;
use App\BusinessRules\Admin\Contracts\IAdminUpdateService;
use App\BusinessRules\Admin\Contracts\IAdminGetByIdService;
use App\BusinessRules\Admin\Contracts\IAdminUpdateValidator;

class AdminUpdateService implements IAdminUpdateService
{
    protected $adminGetByIdService;
    protected $validator;

    public function __construct(
        IAdminGetByIdService $adminGetByIdService,
        IAdminUpdateValidator $validator
    )
    {
        $this->adminGetByIdService = $adminGetByIdService;
        $this->validator = $validator;
    }

    public function update(iterable $data, int $id): object
    {
        try {
            AdminGate::authorize('update');

            $validated = $this->validator->validate($data);

            $admin = $this->adminGetByIdService->getById($id);

            $updated = $admin->update($validated);
            if(!$updated) throw new \Exception("Error Updating", 400);

            return $admin;

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
