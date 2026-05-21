<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/bike-proofreading-test', function () {
    return view('bike-proofreading-test');
});

Route::get('/bound', function () {
    return view('bound');
});
