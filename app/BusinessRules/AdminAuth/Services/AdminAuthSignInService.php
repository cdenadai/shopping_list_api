<?php

namespace App\BusinessRules\AdminAuth\Services;

use App\BusinessRules\AdminAuth\Contracts\IAdminAuthSignInService;
use App\BusinessRules\AdminAuth\Contracts\IAdminAuthSignInValidator;
use App\BusinessRules\Admin\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminAuthSignInService implements IAdminAuthSignInService
{
    protected $model;
    protected $validator;

    public function __construct(Admin $model, IAdminAuthSignInValidator $validator )
    {
        $this->model = $model;
        $this->validator = $validator;
    }

    public function signin(iterable $credentials): object
    {
        try {
            $validated = $this->validator->validate($credentials);

            if (Auth::attempt($validated)) {
                return Auth::user();
            } else {
                throw new \Exception("Invalid Credentials", 400);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
