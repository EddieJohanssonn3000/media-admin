<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;

// Route::redirect('/', '/products');


Route::view('/', 'index')->name('login');

Route::post('/login', LoginController::class)->middleware('guest');

Route::get('/dashboard', DashboardController::class)->middleware('auth');

Route::get('/logout', LogoutController::class);

Route::resource('/products', ProductController::class)->middleware('auth');
