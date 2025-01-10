<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard',[AdminController::class,'home'])->name('home');
Route::get('/admin/login',[AdminController::class,'login'])->name('login');