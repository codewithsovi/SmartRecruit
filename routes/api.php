<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\JabatanController;
use App\Http\Controllers\API\AlternatifController;
use App\Http\Controllers\API\HasilController;
use App\Http\Controllers\API\KandidatController;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('jabatans', JabatanController::class);

    Route::prefix('kandidat')
        ->controller(KandidatController::class)
        ->group(function () {
            Route::get('/jabatan', 'jabatan');
            Route::get('/{jabatan_id}', 'index');
            Route::post('/store', 'store');
            Route::put('/update/{kandidat}', 'update');
            Route::delete('/delete/{kandidat}', 'destroy');
    });

    Route::prefix('alternatif')
        ->controller(AlternatifController::class)
        ->group(function () {
            Route::get('/jabatan', 'jabatan');
            Route::get('jabatan/{jabatan_id}', 'index');
            Route::post('/store', 'store');
            Route::put('/update/{kandidat}', 'update');
            Route::delete('/delete/{kandidat}', 'destroy');
    });

    Route::prefix('hasil')
        ->controller(HasilController::class)
        ->group(function () {
            Route::get('/jabatan', 'jabatan');
            Route::get('/jabatan/{jabatan_id}', 'index');
    });
});

