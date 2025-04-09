<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClearanceRequestController;

Route::get('/clearance-request', [ClearanceRequestController::class, 'create']);
Route::post('/clearance-request', [ClearanceRequestController::class, 'store']);
Route::get('/get-supervisor/{employeeId}', [ClearanceRequestController::class, 'getSupervisor']);


