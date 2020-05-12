<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');

Route::view('/', 'home');
Route::view('/{any}', 'home');
Route::view('/{any}/{anything}', 'home');
