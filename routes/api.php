<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('proveedor',App\Http\Controllers\ProveedorController::class)->only(['index','store','destroy','update','show']);
Route::resource('banco',App\Http\Controllers\BancoController::class)->only(['index','store','destroy','update','show']);
Route::resource('cuenta_corriente',App\Http\Controllers\CuentaCorrienteController::class)->only(['index','store','destroy','update','show']);