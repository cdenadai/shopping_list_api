<?php

namespace App\BusinessRules\AdminAuth\Controllers;

use App\BusinessRules\AdminAuth\Contracts\IAdminAuthSignInService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminAuthSignInController
{
    public function __construct(IAdminAuthSignInService $service)
    {
        $this->service = $service;
    }

    public function login(Request $request) : JsonResponse
    {
        try {
            $credentials = $request->all();
            $loggedAdminUser = $this->service->signin($credentials);

            return response()->json($loggedAdminUser, 200);
        } catch (\Throwable $th) {
            return responseReturn($th);
        }
    }
}
