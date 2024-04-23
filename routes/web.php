<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::group([
        'prefix' => 'account',
        'as' => 'account.'
    ], function () {
        Route::get('/', [UserController::class, 'account'])->name('index');
        Route::post('change-password', [UserController::class, 'changePassword'])->name('change-password');
    });
    require base_path('routes/backend/employee.php');
    require base_path('routes/backend/salary.php');
    require base_path('routes/backend/contract.php');
    require base_path('routes/backend/appendix.php');
    require base_path('routes/backend/reward_discipline.php');
    require base_path('routes/backend/allowance_subsidy.php');
});

