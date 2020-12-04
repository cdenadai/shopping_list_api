<?php

namespace  App\BusinessRules\Admin\Services;

use App\BusinessRules\Admin\Models\Admin;
use App\BusinessRules\Admin\Gates\AdminGate;
use App\BusinessRules\Admin\Contracts\IAdminGetAllService;

class AdminGetAllService implements IAdminGetAllService
{
    protected $admin;

    public function __construct(Admin $admin) {
        $this->admin = $admin;
    }

    public function getAll(): iterable
    {
        try {
            AdminGate::authorize('viewAny');

            $admins = $this->admin->all();
            if(count($admins) <= 0) throw new \Exception("Nenhum registro encontrado", 400);
            return $admins;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
