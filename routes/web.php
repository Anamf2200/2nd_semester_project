<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FailedTestController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TesterController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\TestLogsController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\TesterMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('dashboard')->middleware(AdminMiddleware::class);
Route::get('/', [AdminController::class,'login'])->name('login');
Route::post('/admin/login',[AdminController::class,'authenticate'])->name('user.authenticate');
Route::get('/logout',[AdminController::class,'logout'])->name('user.logout');


Route::get('/register',[AdminController::class,'register'])->name('register')->middleware(AdminMiddleware::class);
Route::post('/tester/register',[AdminController::class,'TesterRegister'])->name('tester.register')->middleware(AdminMiddleware::class);

Route::get('/tester_dashboard',[TesterController::class,'TesterDashboard'])->name('tester.dashboard')->middleware(TesterMiddleware::class);


//products

Route::get('/create',[ProductController::class,'create'])->name('product.create');
Route::get('/read',[ProductController::class,'read'])->name('product.read');

ROute::post('/store',[ProductController::class,'store'])->name('product.store');
Route::get('/show/{productId}',[ProductController::class,'show'])->name('product.show');
Route::post('/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/delete/{id}',[ProductController::class,'delete'])->name('product.delete');


//Testings

Route::get('testing/create',[TestingController::class,'create'])->name('testing.create');
Route::post('/testing/store',[TestingController::class,'store'])->name('testing.store');
Route::get('testing/read',[TestingController::class,'read'])->name('testing.read');
Route::get('testing/edit/{id}',[TestingController::class,'edit'])->name('testing.edit');
Route::post('testing/update/{id}',[TestingController::class,'update'])->name('testing.update');
Route::post('testing/delete/{id}',[TestingController::class,'delete'])->name('testing.delete');
Route::get('testing/show/{id}',[TestingController::class,'show'])->name('testing.show');
Route::get('/testing/search', [TestingController::class, 'search'])->name('testing.search');



//Failed Test
Route::get('/failed/create',[FailedTestController::class,'create'])->name('failed.create');
Route::post('/failed/store',[FailedTestController::class,'store'])->name('failed.store');
Route::get('/failed/read',[FailedTestController::class,'read'])->name('failed.read');
Route::get('failed/edit/{id}',[FailedTestController::class,'edit'])->name('failed.edit');
Route::post('failed/update/{id}',[FailedTestController::class,'update'])->name('failed.update');
Route::get('failed/show/{id}',[FailedTestController::class,'show'])->name('failed.show');
Route::post('failed/delete/{id}',[FailedTestController::class,'delete'])->name('failed.delete');


//Department

Route::get('/dept/create',[DepartmentController::class,'create'])->name('dept.create');
Route::post('/dept/store',[DepartmentController::class,'store'])->name('dept.store');
Route::get('/dept/read',[DepartmentController::class,'read'])->name('dept.read');
Route::get('/dept/edit/{id}',[DepartmentController::class,'edit'])->name('dept.edit');
Route::get('/dept/show/{id}',[DepartmentController::class,'show'])->name('dept.show');
Route::post('/dept/update/{id}',[DepartmentController::class,'update'])->name('dept.update');
Route::post('/dept/delete/{id}',[DepartmentController::class,'delete'])->name('dept.delete');



// TestLogs
Route::get('/testlogs/create',[TestLogsController::class,'create'])->name('testlog.create');
Route::get('/testlogs/read',[TestLogsController::class,'read'])->name('testlog.read');
Route::post('/testlogs/store',[TestLogsController::class,'store'])->name('testlog.store');
Route::get('/testlogs/edit/{id}',[TestLogsController::class,'edit'])->name('testlog.edit');
Route::get('/testlogs/show/{id}',[TestLogsController::class,'edit'])->name('testlog.show');
Route::post('/testlogs/update/{id}',[TestLogsController::class,'update'])->name('testlog.update');
Route::post('/testlogs/delete/{id}',[TestLogsController::class,'delete'])->name('testlog.delete');
















