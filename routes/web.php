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

Route::middleware(['auth', 'admin'])->group(function () {
    
    //Rutas Especialidades
    Route::get('/especialidades', [App\Http\Controllers\admin\SpecialityController::class, 'index']);

    Route::get('/especialidades/create', [App\Http\Controllers\admin\SpecialityController::class, 'create']);
    Route::get('/especialidades/{specialty}/edit', [App\Http\Controllers\admin\SpecialityController::class, 'edit']);
    Route::post('/especialidades', [App\Http\Controllers\admin\SpecialityController::class, 'sendData']);

    Route::put('/especialidades/{specialty}', [App\Http\Controllers\admin\SpecialityController::class, 'update']);
    Route::delete('/especialidades/{specialty}', [App\Http\Controllers\admin\SpecialityController::class, 'destroy']);

    //Rutas Medicos
    Route::resource('medicos', 'App\Http\Controllers\admin\DoctorController');

    //Rutas Pacientes
    Route::resource('pacientes', 'App\Http\Controllers\admin\PacientController');

});

Route::middleware(['auth', 'doctor'])->group(function () {
    Route::get('/horario', [App\Http\Controllers\doctor\HorarioController::class, 'edit']);
    Route::post('/horario', [App\Http\Controllers\doctor\HorarioController::class, 'store']);
});

Route::get('/reservarcitas/create', [App\Http\Controllers\appointmentController::class, 'create']);
Route::post('/miscitas', [App\Http\Controllers\appointmentController::class, 'store']);

