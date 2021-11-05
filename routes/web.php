<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
    //return view('auth.login2');
});

Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('sales/reports_day', [ReportController::class, 'reports_day'])->name('reports.day');
Route::get('sales/reports_date', [ReportController::class, 'reports_date'])->name('reports.date');
Route::post('sales/reports_result', [ReportController::class, 'reports_result'])->name('reports.result');

Route::resource('users', UserController::class)->names('users');

Route::resource('categories', CategoryController::class)->names('categories');

Route::resource('clients', ClientController::class)->names('clients');

Route::resource('providers', ProviderController::class)->names('providers');

Route::resource('products', ProductController::class)->names('products');

Route::resource('purchases', PurchaseController::class)->names('purchases');
Route::post('change_status/purchases/{purchase}', [PurchaseController::class, 'change_status'])->name('purchases.change.status');
Route::get('purchases/pdf/{purchase}', [PurchaseController::class, 'pdf'])->name('purchases.pdf');

Route::resource('sales', SaleController::class)->names('sales');
Route::post('change_status/sales/{sale}', [PurchaseController::class, 'change_status'])->name('sales.change.status');

Route::resource('roles', RoleController::class)->names('roles');
Route::resource('permissions', PermissionController::class)->names('permissions');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
