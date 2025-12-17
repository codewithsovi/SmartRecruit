<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('jabatan')
        ->as('admin.jabatan.')
        ->controller(JabatanController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::put('/update/{jabatan}', 'update')->name('update');
            Route::delete('/delete/{jabatan}', 'destroy')->name('delete');
        });
});
