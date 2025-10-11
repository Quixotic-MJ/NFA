<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Auth.Sign_in');
});

Route::get('/dashboard', function () {
    return view('Dashboard.dashboard');
}) ->name('dashboard');
