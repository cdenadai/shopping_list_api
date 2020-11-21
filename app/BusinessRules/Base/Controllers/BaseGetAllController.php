<?php

namespace App\BusinessRules\Base\Controllers;

use App\Http\Controllers\Controller;

class BaseGetAllController extends Controller
{
    protected $service;

    public function getAll()
    {
        try {
            $listOfObjects = $this->service->getAll();

            return response()->json($listOfObjects, 200);
        } catch (\Throwable $th) {
            return responseReturn($th);
        }
    }
}
