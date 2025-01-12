<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TesterController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\TesterMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('dashboard')->middleware(AdminMiddleware::class);
Route::get('/login', [AdminController::class,'login'])->name('login');
Route::post('/admin/login',[AdminController::class,'authenticate'])->name('user.authenticate');
Route::get('/logout',[AdminController::class,'logout'])->name('user.logout');


Route::get('/register',[AdminController::class,'register'])->name('register')->middleware(AdminMiddleware::class);
Route::post('/tester/register',[AdminController::class,'TesterRegister'])->name('tester.register')->middleware(AdminMiddleware::class);

Route::get('/tester_dashboard',[TesterController::class,'TesterDashboard'])->name('tester.dashboard')->middleware(TesterMiddleware::class);