<?php

use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FornecedorController::class, 'index']);

Route::delete('fornecedores/destroy-multiple', [FornecedorController::class, 'destroyMultiple'])->name('fornecedores.destroy-multiple');
Route::resource('fornecedores', FornecedorController::class)->parameters([
    'fornecedores' => 'fornecedor'
]);
Route::delete('produtos/destroy-multiple', [ProdutoController::class, 'destroyMultiple'])->name('produtos.destroy-multiple');
Route::resource('produtos', ProdutoController::class);
