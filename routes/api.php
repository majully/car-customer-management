<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

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

// Cadastrar novo cliente
Route::post('cliente', [ClienteController::class, 'store']);

// Editar cadastro de um cliente
Route::put('cliente/{id}', [ClienteController::class, 'update']);

// Excluir cadastro de cliente
Route::delete('cliente/{id}', [ClienteController::class,'destroy']);

// Consultar cadastro de um cliente
Route::get('cliente/{id}', [ClienteController::class, 'showOne']);

// Consultar cliente pelo último número da placa
Route::get('consulta/final-placa/{numero}', [ClienteController::class, 'showPlate']);
