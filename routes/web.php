<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

    Route::get('/investments', [App\Http\Controllers\InvestmentController::class, 'index'])->name('investments.index');

    Route::get('/investment/add', [App\Http\Controllers\InvestmentController::class, 'create'])->name('investments.add');
    Route::post('/investment/store', [App\Http\Controllers\InvestmentController::class, 'store'])->name('investments.store');

    Route::get('/investment/edit/{id}', [App\Http\Controllers\InvestmentController::class, 'edit'])->name('investments.edit');
    Route::put('/investment/update/{id}', [App\Http\Controllers\InvestmentController::class, 'update'])->name('investments.update');

    Route::delete('/investment/destroy/{id}', [App\Http\Controllers\InvestmentController::class, 'destroy'])->name('investments.destroy');
});
