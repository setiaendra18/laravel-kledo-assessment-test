<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function(){
    Route::get('/references', [App\Http\Controllers\api\ReferencesController::class, 'index']);
    Route::get('/empolyees', [App\Http\Controllers\api\EmployeesController::class, 'index']);
    Route::get('/empolyees/store', [App\Http\Controllers\api\EmployeesController::class, 'store']);
});