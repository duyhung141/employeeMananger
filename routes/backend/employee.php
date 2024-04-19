<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;


Route::group([
    'prefix' => 'employee',
    'middleware' => ['auth'],
    'as' => 'employee.'
], function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('create', [EmployeeController::class, 'create'])->name('create');
    Route::post('store', [EmployeeController::class, 'store'])->name('store');
    Route::prefix('{employee}')->group(function () {
        Route::get('edit', [EmployeeController::class, 'edit'])->name('edit');
        Route::post('update', [EmployeeController::class, 'update'])->name('update');
        Route::get('show', [EmployeeController::class, 'show'])->name('show');
        Route::delete('destroy', [EmployeeController::class, 'destroy'])->name('destroy');
    });
});
