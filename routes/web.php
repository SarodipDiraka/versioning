<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;



Route::get('/', [BlogController::class, 'index']);
Route::get('/detail/{id}', [BlogController::class, 'detail']);
Route::post('/blog/v1', [BlogController::class, 'blogV1']);
Route::post('/blog/v2', [BlogController::class, 'blogV2']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

