<?php

namespace App\BusinessRules\Base\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseUpdateController extends Controller
{
    protected $service;

    public function update($id, Request $request)
    {
        try {
            $data = $request->all();

            $updatedObject = $this->service->update($data, $id);

            return response()->json($updatedObject, 200);
        } catch (\Throwable $th) {
            return responseReturn($th);
        }
    }
}
