<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Proyectos\ProyectosController;


Route::get('/', function () {
    return view('proyectos.proyectos');
});
Route::get('/', [ProyectosController::class, 'index'])->name('inicio');

Route::controller(ProyectosController::class)->group(function () {
    Route::get('proyectos','index');
    Route::get('obtenerproyectos','proyectos');
    Route::post('guardarproyecto','store');
    Route::delete('eliminarproyecto','delete');
    Route::put('modificarproyecto','update');
 /*   Route::get('politica-garantia','politicagarantia');
    Route::get('manifiestos','manifiestos'); */
});