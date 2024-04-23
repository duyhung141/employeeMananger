<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppendixController;


Route::group([
    'prefix' => 'appendix',
    'middleware' => ['auth.admin'],
    'as' => 'appendix.'
], function () {
    Route::get('/', [AppendixController::class, 'index'])->name('index');
    Route::get('create', [AppendixController::class, 'create'])->name('create');
    Route::post('store', [AppendixController::class, 'store'])->name('store');
    Route::prefix('{appendix}')->group(function () {
        Route::get('edit', [AppendixController::class, 'edit'])->name('edit');
        Route::post('update', [AppendixController::class, 'update'])->name('update');
        Route::get('show', [AppendixController::class, 'show'])->name('show');
        Route::delete('destroy', [AppendixController::class, 'destroy'])->name('destroy');
    });
    Route::get('{employee_id}/contract', [AppendixController::class, 'getContract'])->name('get-contract');
});
