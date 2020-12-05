<?php

namespace  App\BusinessRules\Admin\Services;

use App\BusinessRules\Admin\Models\Admin;
use App\BusinessRules\Admin\Gates\AdminGate;
use App\BusinessRules\Admin\Contracts\IAdminGetByIdService;

class AdminGetByIdService implements IAdminGetByIdService
{
    protected $admin;

    public function __construct(Admin $admin) {
        $this->admin = $admin;
    }

    public function getById(int $id): object
    {
        try {
            AdminGate::authorize('view');

            $admin = $this->admin->find($id);
            if(!$admin) throw new \Exception("Usuário não encontrado", 400);

            return $admin;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
