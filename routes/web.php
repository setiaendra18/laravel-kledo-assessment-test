<?php
use App\Http\Controllers\api\EmployeesController;
use App\Http\Controllers\api\OvertimeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees-overtime', function () {
    return view('overtime');
});

Route::get('/employees-overtime-calculated', function () {
    return view('overtime_cal');
});
Route::prefix('api')->group(function () {
    Route::get('/references', [App\Http\Controllers\api\ReferencesController::class, 'index']);
    Route::controller(EmployeesController::class)->group(function () {
        Route::get('/empolyees','index');
        Route::post('/empolyee','store');
    });
    Route::controller(OvertimeController::class)->group(function () {
        Route::get('/overtimes','index');
        Route::post('/overtime','store');
        Route::get('/overtime-pays','overtime_calculation')->name('overtime-pays');
    });
});
