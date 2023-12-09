<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index']);


// EmployeeController
route::resource('employees', EmployeeController::class);
Route::get('employee-status{employee}', [EmployeeController::class, 'change_status']);

// ProductController
Route::resource('products', ProductController::class);
Route::get('product-status{product}', [ProductController::class, 'change_status']);

// ProductController
Route::resource('productimages', ProductImageController::class);

