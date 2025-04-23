<?php

use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FornecedorController::class, 'index']);

Route::resource('fornecedores', FornecedorController::class)->parameters([
    'fornecedores' => 'fornecedor'
]);
Route::resource('produtos', ProdutoController::class);
