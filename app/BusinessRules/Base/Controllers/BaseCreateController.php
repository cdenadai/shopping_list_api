<?php

namespace App\BusinessRules\Base\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseCreateController extends Controller
{
    protected $service;

    public function create(Request $request)
    {
        try {
            $data = $request->all();

            $object = $this->service->create($data);

            return response()->json($object, 201);
        } catch (\Throwable $th) {
            return responseReturn($th);
        }
    }
}
