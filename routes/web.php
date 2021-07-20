<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\TipoDocumentoController;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    Route::resource('/documento', DocumentoController::class);
    
    Route::name('cadastroBasico.')->group(function () {
        Route::resource('/cadastroBasico/instituicao', InstituicaoController::class);
        Route::resource('/cadastroBasico/tipoDocumento', TipoDocumentoController::class);
    });
});


require __DIR__.'/auth.php';
