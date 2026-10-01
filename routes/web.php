<?php

use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;
use App\Models\Tugas;

Route::get('/', function () {
    return view('home');
});

Route::resource('tugas', TugasController::class)->except('show');
Route::get('/api/tugas', function () {
    return Tugas::latest()->get();
});