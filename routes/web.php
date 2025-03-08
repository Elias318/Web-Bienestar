<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/crear-cuenta', function () {
    return view('crear_cuenta');
})->name('crear-cuenta');


Route::get('/iniciar-sesion', function () {
    return view('inicio_sesion');
})->name('iniciar-sesion');



Route::get('/vistaAdmin', [AdminController::class,'mostrarPanel'])->name('vistaAdmin');


Route::get('/ejercicio-create', [EntradaController::class,'create'])->name('ejercicio-create');

Route::post('/ejercicio-store', [EntradaController::class,'store'])->name('ejercicio-store');



Route::post('/registro', [LoginController::class,'registro'])->name('registro');
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::post('/logout', [LoginController::class,'logout'])->name('logout');
