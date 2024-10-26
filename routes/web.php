<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Proyectos\ProyectosController;
use App\Http\Controllers\Proyectos\TareasController;


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
});


Route::controller(TareasController::class)->group(function () {
    Route::post('guardartarea','store');
    Route::delete('eliminartarea','delete');
    Route::put('modificartarea','update');
});