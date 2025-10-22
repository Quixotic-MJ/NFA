<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('Auth.Login');
}) ->name('logout');

Route::post('/', [AuthController::class, 'logout'])->name('logout');

// ===================================================================
// ADMIN
// ===================================================================

Route::get('/Dashboard', function () {
    return view('Components.layouts.admin.dashboard');
}) ->name('Dashboard');

Route::get('/Logs', function () {
    return view('Components.layouts.admin.auditLogs');
}) ->name('Logs');

Route::get('/Profile', function () {
    return view('Components.layouts.admin.profile');
}) ->name('Profile');

Route::get('/Users', function () {
    return view('Components.layouts.admin.userManagement');
}) ->name('Users');

Route::get('/Setting', function () {
    return view('Components.layouts.admin.systemSetting');
}) ->name('Setting');

Route::get('/notifications', function () {
    return view('Components.notifications.notif');
}) ->name('notifications');
