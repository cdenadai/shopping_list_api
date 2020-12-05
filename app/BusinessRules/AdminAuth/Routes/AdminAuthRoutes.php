<?php

use Illuminate\Support\Facades\Route;

use App\BusinessRules\AdminAuth\Controllers\AdminAuthSignInController as AdminAuthSignIn;

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
Route::post('/signin', [ AdminAuthSignIn::class, 'signin' ])->name('adminAuth.signin');
