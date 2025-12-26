<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RevenueController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MasterCategoryController;
use App\Http\Controllers\Admin\CategoryController;

// Public admin auth routes (no middleware) - separate login page for admin panel
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Protected admin panel routes
Route::middleware(['isAdmin'])->group(function () {
    // Admin Routes with 'admin' prefix
    Route::prefix('admin')->as('admin.')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('category', MasterCategoryController::class)->names('category');
        Route::resource('categories', CategoryController::class)->names('categories');

        Route::get('/orders', [AdminOrderController::class, 'orders'])->name('orders');
        Route::get('/pickup',[AdminOrderController::class, 'pickup'])->name('pickup');
        Route::get('/routeOptimize', [RouteController::class, 'routeOptimize'])->name('routeOptimize');
        Route::get('/tailor',[UserController::class, 'tailor'])->name('tailor');
        Route::get('/account',[UserController::class, 'account'])->name('account');
        Route::get('/user_edit',[UserController::class, 'userEdit'])->name('userEdit');

        // User Management
        Route::get('/users',[UserController::class, 'index'])->name('users.index');
        Route::get('/users/{id}',[UserController::class, 'show'])->name('users.show');
        Route::post('/users',[UserController::class, 'store'])->name('users.store');
        Route::put('/users/{id}',[UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}',[UserController::class, 'destroy'])->name('users.destroy');
        
        Route::get('/financial',[RevenueController::class, 'financial'])->name('financial');
        Route::get('/report',[RevenueController::class, 'report'])->name('report');

    });
});