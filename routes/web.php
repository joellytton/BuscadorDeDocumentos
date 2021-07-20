<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentoController;
<<<<<<< HEAD
use App\Http\Controllers\EmitenteController;
use App\Http\Controllers\MigracaoController;
=======
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\Selects\CategoriaPorNome;
>>>>>>> dcdc6719630fd7251a700c8112b23c4d1d9cca98
use App\Http\Controllers\TipoDocumentoController;

// Route::get('/migracao', [MigracaoController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    Route::resource('/documento', DocumentoController::class);
    
    Route::name('cadastroBasico.')->group(function () {
        Route::resource('/cadastroBasico/instituicao', InstituicaoController::class);
        Route::resource('/cadastroBasico/tipoDocumento', TipoDocumentoController::class);
    });

    Route::post('/empresas/buscar-por/nome', CategoriaPorNome::class);
});


require __DIR__.'/auth.php';
