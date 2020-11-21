<?php

namespace App\BusinessRules\Base\Controllers;

use App\Http\Controllers\Controller;

class BaseDeleteController extends Controller
{
    protected $service;

    public function delete($id)
    {
        try {
            $wasDeleted = $this->service->delete($id);

            return response()->json($wasDeleted, 200);
        } catch (\Throwable $th) {
            return responseReturn($th);
        }
    }
}
