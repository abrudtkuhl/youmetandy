<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/bike-proofreading-test', function () {
    return view('bike-proofreading-test');
});

Route::get('/dropinadmin', function () {
    return view('dropinadmin');
});

Route::get('/velir', function () {
    return view('velir');
});

Route::get('/domaine', function () {
    return view('domaine');
});
