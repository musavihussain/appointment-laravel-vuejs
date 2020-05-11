<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Login
Route::post('login', 'AuthController@login');


Route::middleware(['auth:sanctum'])->group(function () {
    // Appointment
    Route::get('appointments', 'AppointmentController@index');
    Route::post('appointment', 'AppointmentController@create');
});
