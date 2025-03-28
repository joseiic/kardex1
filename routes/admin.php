<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;

Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'dashboard'])->name('admin.dashboard');
Route::resource('/paciente',PacienteController::class);
