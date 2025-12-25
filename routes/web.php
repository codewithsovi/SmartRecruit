<?php

use App\Models\Kandidat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HimpunanFuzzyController;
use App\Http\Controllers\AturanFuzzyController;
use App\Http\Controllers\AlternatifController;

Route::get('/', function () {
    return view('landing-page');
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

    Route::prefix('kandidat')
        ->as('admin.kandidat.')
        ->controller(KandidatController::class)
        ->group(function () {
            Route::get('/kandidat/{jabatan_id}', 'index')->name('index.byJabatan');
            Route::post('/store', 'store')->name('store.byJabatan');
            Route::put('/update/{kandidat}', 'update')->name('update.byJabatan');
            Route::delete('/delete/{kandidat}', 'destroy')->name('delete.byJabatan');
        });

    Route::prefix('kriteria')
        ->as('admin.kriteria.')
        ->controller(KriteriaController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::put('/update/{kriteria}', 'update')->name('update');
            Route::delete('/delete/{kriteria}', 'destroy')->name('delete');
        });

    Route::prefix('himpunan')
        ->as('admin.himpunan.')
        ->controller(HimpunanFuzzyController::class)
        ->group(function () {
            Route::get('/himpunan/{kriteria_id}', 'index')->name('index.byKriteria');
            Route::post('/store', 'store')->name('store.byKriteria');
            Route::put('/update/{himpunanFuzzy}', 'update')->name('update.byKriteria');
            Route::delete('/delete/{himpunanFuzzy}', 'destroy')->name('delete.byKriteria');
        });
        
    Route::prefix('aturan')
        ->as('admin.aturan.')
        ->controller(AturanFuzzyController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::put('/update/{aturanFuzzy}', 'update')->name('update');
            Route::delete('/delete/{aturanFuzzy}', 'destroy')->name('delete');
            Route::delete('/reset-all', 'resetAll')->name('resetAll');
        });

    Route::prefix('alternatif')
        ->as('admin.alternatif.')
        ->controller(AlternatifController::class)
        ->group(function () {
            Route::get('/jabatan', 'jabatan')->name('jabatan');
            Route::get('/alternatif/{jabatan_id}', 'index')->name('index.byJabatan');
            Route::post('/store', 'store')->name('store.byJabatan');
            Route::put('/update/{kandidat}', 'update')->name('update.byJabatan');
            Route::delete('/delete/{kandidat}', 'destroy')->name('delete.byJabatan');
        });
});
