<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;



Route::get('/', [BlogController::class, 'index']);
Route::get('/detail/v1/{id}', [BlogController::class, 'detailV1']);
Route::get('/detail/v2', [BlogController::class, 'detailV2']);
Route::post('/blog/v1', [BlogController::class, 'blogV1']);
Route::post('/blog/v2', [BlogController::class, 'blogV2']);
Route::post('/delete/{id}', [BlogController::class, 'delete']);
Route::post('/update', [BlogController::class, 'update']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

