<?php

use App\Http\Controllers\Guest\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CustomerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

# Home Page Route
Route::get('/', [IndexController::class, 'index'])->name('index');

# Customer Authentication Routes
Auth::routes();

#user Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
   Route::resource('customers',CustomerController::class);
});