<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\Authuses;
use App\Http\Controllers\ResetAdminController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register-admin', [RegisterAdminController::class, 'createAdmin']);
Route::post('/login', [Authuses::class, 'login']);
Route::post('password/forgot-password',[ForgotPasswordController::class,'forgotPassword']);
Route::post('password/reset-password',[ResetAdminController::class,'passwordReset']);