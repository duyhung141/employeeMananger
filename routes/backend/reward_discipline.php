<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RewardDisciplineController;


Route::group([
    'prefix' => 'reward-discipline',
    'middleware' => ['auth.admin'],
    'as' => 'reward_discipline.'
], function () {
    Route::get('/', [RewardDisciplineController::class, 'index'])->name('index');
    Route::get('create', [RewardDisciplineController::class, 'create'])->name('create');
    Route::post('store', [RewardDisciplineController::class, 'store'])->name('store');
    Route::prefix('{reward_discipline}')->group(function () {
        Route::get('edit', [RewardDisciplineController::class, 'edit'])->name('edit');
        Route::post('update', [RewardDisciplineController::class, 'update'])->name('update');
        Route::get('show', [RewardDisciplineController::class, 'show'])->name('show');
        Route::delete('destroy', [RewardDisciplineController::class, 'destroy'])->name('destroy');
    });
});
