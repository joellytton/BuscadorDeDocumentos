<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EmitenteController;
use App\Http\Controllers\MigracaoController;
use App\Http\Controllers\TipoDocumentoController;

// Route::get('/migracao', [MigracaoController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    Route::resource('/documento', DocumentoController::class);
    
    Route::name('cadastroBasico.')->group(function () {
        Route::resource('/cadastroBasico/tipoDocumento', TipoDocumentoController::class);
        Route::resource('/cadastroBasico/emitente', EmitenteController::class);
    });
});


require __DIR__.'/auth.php';
