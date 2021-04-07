<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ App\Http\Controllers\LenguajeControlller::class, 'start' ]);
Route::prefix('/')->group(function () {
    Route::get('/{lg}',[ App\Http\Controllers\LenguajeControlller::class, 'homeTraduc' ]);//idioma
    Route::prefix('verificacion/{name}')->group(function(){
        Route::get('/{lg}', [ App\Http\Controllers\LenguajeControlller::class, 'verificar' ]);
    });
    Route::post('/verificacion',[App\Http\Controllers\LenguajeControlller::class, 'verificacion' ])->name('archivo.veerificacion');
    Route::prefix('archivo/{empresa}/{id}')->group(function(){
        Route::get('/{lg}', [ App\Http\Controllers\LenguajeControlller::class, 'welcom' ]);

    });

    Route::get('/download/{name}' , [ App\Http\Controllers\LenguajeControlller::class, 'downloadFile' ]);
    Auth::routes(["register" => false]);

    Route::prefix('/home')->group(function () {
        Route::get('/{lg}',[ App\Http\Controllers\HomeController::class, 'index' ]);//idioma
    });
    Route::prefix('/documento')->group(function () {
        Route::get('/{lg}',[ App\Http\Controllers\HomeController::class, 'showIndex' ])->name('Inicio.archivo.subir');//idioma
        Route::post('/subir', [\App\Http\Controllers\HomeController::class, 'storeArchivo'])->name('Inicio.archivo.subir');
    });
    Route::prefix('/404')->group(function () {
        Route::get('/{lg}',[ App\Http\Controllers\LenguajeControlller::class, 'error' ]);//idioma
    });
});

