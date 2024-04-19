<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllowanceSubsidyController;


Route::group([
    'prefix' => 'allowance-subsidy',
//    'middleware' => ['auth'],
    'as' => 'allowance_subsidy.'
], function () {
    Route::get('/', [AllowanceSubsidyController::class, 'index'])->name('index');
    Route::get('create', [AllowanceSubsidyController::class, 'create'])->name('create');
    Route::post('store', [AllowanceSubsidyController::class, 'store'])->name('store');
    Route::prefix('{allowance_subsidy}')->group(function () {
        Route::get('edit', [AllowanceSubsidyController::class, 'edit'])->name('edit');
        Route::post('update', [AllowanceSubsidyController::class, 'update'])->name('update');
        Route::get('show', [AllowanceSubsidyController::class, 'show'])->name('show');
        Route::delete('destroy', [AllowanceSubsidyController::class, 'destroy'])->name('destroy');
    });
});
