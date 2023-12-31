<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas Especialidades
Route::get('/especialidades', [App\Http\Controllers\SpecialityController::class, 'index']);

Route::get('/especialidades/create', [App\Http\Controllers\SpecialityController::class, 'create']);
Route::get('/especialidades/{specialty}/edit', [App\Http\Controllers\SpecialityController::class, 'edit']);
Route::post('/especialidades', [App\Http\Controllers\SpecialityController::class, 'sendData']);

Route::put('/especialidades/{specialty}', [App\Http\Controllers\SpecialityController::class, 'update']);
Route::delete('/especialidades/{specialty}', [App\Http\Controllers\SpecialityController::class, 'destroy']);
