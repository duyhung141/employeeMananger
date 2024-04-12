<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;


Route::group([
    'prefix' => 'employee',
//    'middleware' => ['auth:api'],
    'as' => 'employee.'
], function () {
    Route::get('/', [EmployeeController::class, 'index']);
});
