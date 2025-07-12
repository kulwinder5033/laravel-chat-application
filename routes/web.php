<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Guest\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ChatController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\User\FollowUpController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

# Home Page Route
Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('auth/google', [SocialiteController::class, 'googlelogin'])->name('auth.login');
Route::get('auth/google-callback', [SocialiteController::class, 'handleGoogleCallback'])->name('auth.google.callback');

# Customer Authentication Routes
Auth::routes();

#user Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
   //customer routes
   Route::resource('customers',CustomerController::class);

   // chat routes
   Route::get('chat',[ChatController::class, 'index'])->name('chat.index');
   Route::post('broadcast', [ChatController::class, 'broadcast'])->name('chat.broadcast');
   Route::post('receive', [ChatController::class, 'receive'])->name('chat.receive');

   // follow up routes
   Route::resource('follow-ups',FollowUpController::class);
 
});