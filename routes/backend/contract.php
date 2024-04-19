<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;


Route::group([
    'prefix' => 'contract',
//    'middleware' => ['auth'],
    'as' => 'contract.'
], function () {
    Route::get('/', [ContractController::class, 'index'])->name('index');
    Route::get('create', [ContractController::class, 'create'])->name('create');
    Route::post('store', [ContractController::class, 'store'])->name('store');
    Route::prefix('{contract}')->group(function () {
        Route::get('edit', [ContractController::class, 'edit'])->name('edit');
        Route::post('update', [ContractController::class, 'update'])->name('update');
        Route::get('show', [ContractController::class, 'show'])->name('show');
        Route::delete('destroy', [ContractController::class, 'destroy'])->name('destroy');
    });
    Route::get('{employee_id}/salary', [ContractController::class, 'getSalary'])->name('get-salary');
});
