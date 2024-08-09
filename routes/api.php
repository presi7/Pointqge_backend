<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

Route::post('/arrival', [AttendanceController::class, 'recordArrival']);
Route::post('/departure', [AttendanceController::class, 'recordDeparture']);
Route::get('/attendances', [AttendanceController::class, 'getAttendances']);
