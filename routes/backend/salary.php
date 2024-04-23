<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaryController;


Route::group([
    'prefix' => 'salary',
    'middleware' => ['auth.admin'],
    'as' => 'salary.'
], function () {
    Route::get('/', [SalaryController::class, 'index'])->name('index');
    Route::get('create', [SalaryController::class, 'create'])->name('create');
    Route::post('store', [SalaryController::class, 'store'])->name('store');
    Route::prefix('{salary}')->group(function () {
        Route::get('edit', [SalaryController::class, 'edit'])->name('edit');
        Route::post('update', [SalaryController::class, 'update'])->name('update');
        Route::get('show', [SalaryController::class, 'show'])->name('show');
        Route::delete('destroy', [SalaryController::class, 'destroy'])->name('destroy');
    });
});
