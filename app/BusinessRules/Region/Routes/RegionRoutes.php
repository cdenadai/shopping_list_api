<?php

use Illuminate\Support\Facades\Route;

use App\BusinessRules\Region\Controllers\RegionCreateController as RegionCreate;
use App\BusinessRules\Region\Controllers\RegionUpdateController as RegionUpdate;
use App\BusinessRules\Region\Controllers\RegionGetAllController as RegionGetAll;
use App\BusinessRules\Region\Controllers\RegionDeleteController as RegionDelete;
use App\BusinessRules\Region\Controllers\RegionGetByIdController as RegionGetById;

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
Route::get('/', [ RegionGetAll::class, 'getAll' ])->name('regions.getAll');
Route::get('/{id}', [ RegionGetById::class, 'getById' ])->name('regions.getById');
Route::put('/{id}', [ RegionUpdate::class, 'update' ])->name('regions.update');
Route::post('/', [ RegionCreate::class, 'create' ])->name('regions.create');
Route::delete('/{id}', [ RegionDelete::class, 'delete' ])->name('regions.delete');
