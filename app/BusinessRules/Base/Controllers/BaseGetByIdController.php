<?php

namespace App\BusinessRules\Base\Controllers;

use App\Http\Controllers\Controller;

class BaseGetByIdController extends Controller
{
    protected $service;

    public function getById($id)
    {
        try {
            $model = $this->service->getById($id);

            return response()->json($model, 200);
        } catch (\Throwable $th) {
            return responseReturn($th);
        }
    }
}
