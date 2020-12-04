<?php

namespace  App\BusinessRules\Admin\Services;

use App\BusinessRules\Admin\Gates\AdminGate;
use App\BusinessRules\Admin\Contracts\IAdminDeleteService;
use App\BusinessRules\Admin\Contracts\IAdminGetByIdService;

class AdminDeleteService implements IAdminDeleteService
{
    protected $adminGetByIdService;

    public function __construct(IAdminGetByIdService $adminGetByIdService)
    {
        $this->adminGetByIdService = $adminGetByIdService;
    }

    public function delete(int $id): bool
    {
        try {
            AdminGate::authorize('delete');

            $admin = $this->adminGetByIdService->getById($id);
            return $admin->delete($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
