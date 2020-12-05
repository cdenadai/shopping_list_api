<?php

namespace  App\BusinessRules\Admin\Services;

use App\BusinessRules\Admin\Models\Admin;
use App\BusinessRules\Admin\Contracts\IAdminCreateService;
use App\BusinessRules\Admin\Contracts\IAdminCreateValidator;

class AdminCreateService implements IAdminCreateService
{
    protected $admin;
    protected $validator;

    public function __construct(Admin $admin, IAdminCreateValidator $validator)
    {
        $this->admin = $admin;
        $this->validator = $validator;
    }

    public function create(iterable $data): object
    {
        try {
            $validated = $this->validator->validate($data);

            $validated['level'] = 'admin';

            $created = $this->admin->create($validated);
            if(!$created) throw new \Exception("Falha ao cadastrar usuário", 400);

            return $created;

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
