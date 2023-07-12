<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PlantaoController;
use App\Http\Controllers\CuidadorController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('consulta/{id}', [ConsultaController::class, 'getById']);
Route::get('plantao/{id}', [PlantaoController::class, 'getById']);
Route::get('cuidador/{cpf}/plantao', [CuidadorController::class, 'getPlantaoByCpf']);
Route::get('cuidador', [CuidadorController::class, 'getAll']);
Route::get('cuidador/{cpf}', [CuidadorController::class, 'getByCpf']);
Route::post('cuidador', [CuidadorController::class, 'insert']);
