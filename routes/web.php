<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\Selects\CategoriaPorNome;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    Route::resource('/documento', DocumentoController::class);
    
    Route::name('cadastroBasico.')->group(function () {
        Route::resource('/cadastroBasico/categoria', CategoriaController::class);
        Route::resource('/cadastroBasico/instituicao', InstituicaoController::class);
        Route::resource('/cadastroBasico/tipoDocumento', TipoDocumentoController::class);
        Route::resource('/cadastroBasico/usuario', UserController::class);
    });

    Route::post('/empresas/buscar-por/nome', CategoriaPorNome::class);
});


require __DIR__.'/auth.php';
