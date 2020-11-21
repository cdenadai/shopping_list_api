<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\BusinessRules\Admin\Controllers\AdminCreateController as AdminCreate;
use App\BusinessRules\Admin\Controllers\AdminUpdateController as AdminUpdate;
use App\BusinessRules\Admin\Controllers\AdminGetAllController as AdminGetAll;
use App\BusinessRules\Admin\Controllers\AdminDeleteController as AdminDelete;
use App\BusinessRules\Admin\Controllers\AdminGetByIdController as AdminGetById;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function () {
    Route::get('/', [ AdminGetAll::class, 'getAll' ])->name('admin.getAll');
    Route::get('/{id}', [ AdminGetById::class, 'getById' ])->name('admin.getById');;
    Route::put('/{id}', [ AdminUpdate::class, 'update' ])->name('admin.update');;
    Route::post('/', [ AdminCreate::class, 'create' ])->name('admin.create');;
    Route::delete('/{id}', [ AdminDelete::class, 'delete' ])->name('admin.delete');;
});
