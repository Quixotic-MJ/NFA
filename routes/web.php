<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('Auth.Sign_in');
}) ->name('logout');

Route::post('/', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('Components.dashboard');
}) ->name('dashboard');

Route::get('/distribution', function () {
    return view('Components.distribution');
}) ->name('distribution');

Route::get('/inventory', function () {
    return view('Components.inventory');
}) ->name('inventory');

Route::get('/purchasing', function () {
    return view('Components.purchasing');
}) ->name('purchasing');

Route::get('/reports', function () {
    return view('Components.reports');
}) ->name('reports');

Route::get('/warehouses', function () {
    return view('Components.404.404_page');
}) ->name('warehouses'); 

Route::get('/userManagement', function () {
    return view('Components.userManagement');
}) ->name('users'); 

Route::get('/forms', function () {
    return view('Components.forms');
}) ->name('forms'); 

Route::get('/profile', function () {
    return view('Components.profile');
}) ->name('profile'); 

Route::get('/notifications', function () {
    return view('Components.notifications.notif');
}) ->name('notifications');
