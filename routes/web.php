<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ExtrasController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\MeasurementController;
use App\Http\Controllers\Site\ProfileController as SiteProfileController;

Route::prefix('server-commands')->group(function () {
    Route::get('optimize', function () {
        \Artisan::call('optimize');
        \Artisan::call('config:clear');
        \Artisan::call('view:clear');
        \Artisan::call('route:cache');
        \Artisan::call('route:clear');
        dd("Done!");
    });
});

//SITE HOME ROUTE
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/topwear', [HomeController::class, 'topwear'])->name('topwear');
Route::get('/category/{slug}', [HomeController::class, 'masterCategory'])->name('mastercategory.show');
Route::get('/faq', [ExtrasController::class, 'faq'])->name('faq');
Route::get('/about', [ExtrasController::class, 'about'])->name('about');
Route::get('/notification', [ExtrasController::class, 'notification'])->name('notification');
 


//Order
Route::get('/order-history', [OrderController::class, 'orderHistory'])->name('order.history');
Route::get('/order-details/{id}', [OrderController::class, 'orderDetails'])->name('order.details');
Route::get('/feedback/{id}', [OrderController::class, 'feedback'])->name('order.feedback');
Route::get('/track-order/{id}', [OrderController::class, 'trackOrder'])->name('order.track');
Route::get('/cart', [OrderController::class, 'cart'])->name('order.cart');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');

//Measurement Options
Route::get('/measurement-options', [MeasurementController::class, 'measurementOptions'])->name('measurementOptions');
Route::get('/garment-details', [MeasurementController::class, 'garmentDetails'])->name('garmentDetails');
Route::get('/manual-measurement', [MeasurementController::class, 'manualMeasurement'])->name('manualMeasurement');//
Route::get('/fit-sample-cloth', [MeasurementController::class, 'fitSampleCloth'])->name('fitSampleCloth');//
Route::get('/alteration-instruction', [MeasurementController::class, 'alterationInstruction'])->name('alterationInstruction');//
Route::get('/checkout', [MeasurementController::class, 'checkout'])->name('checkout');

//PROFILE
Route::get('/accounts', [SiteProfileController::class, 'accounts'])->name('accounts');
Route::get('/subscription', [SiteProfileController::class, 'subscription'])->name('subscription');
Route::get('/monthly-subscription', [SiteProfileController::class, 'monthlySubscription'])->name('monthlySubscription');//
Route::get('/quarter-subscription', [SiteProfileController::class, 'quarterSubscription'])->name('quarterSubscription');//
Route::get('/year-subscription', [SiteProfileController::class, 'yearSubscription'])->name('yearSubscription');//    
Route::get('/refer', [SiteProfileController::class, 'referAndEarn'])->name('refer');
Route::get('/donate', [SiteProfileController::class, 'donateClothes'])->name('donate');
Route::get('/donation-history', [SiteProfileController::class, 'donationHistory'])->name('donationHistory');
Route::get('/track-donation', [SiteProfileController::class, 'trackDonation'])->name('trackDonation');
Route::get('/view-profile', [SiteProfileController::class, 'viewProfile'])->middleware('auth')->name('viewProfile');
Route::post('/update-profile', [SiteProfileController::class, 'updateProfile'])->middleware('auth')->name('updateProfile');
Route::post('/remove-profile-picture', [SiteProfileController::class, 'removeProfilePicture'])->middleware('auth')->name('removeProfilePicture');
Route::get('/settings', [SiteProfileController::class, 'settings'])->name('settings');
Route::get('/wallet', [SiteProfileController::class, 'wallet'])->name('wallet');



// Admin Routes with 'admin' prefix 
// Route::prefix('admin')->as('admin.')->group(function () {
//     Route::get('/adminlogin', function () {
//         return view('admin.login');
//     })->name('login');
//     Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
//     Route::get('/orders', [AdminOrderController::class, 'orders'])->name('orders');
//     Route::get('/pickup',[AdminOrderController::class, 'pickup'])->name('pickup');
//     Route::get('/routeOptimize', [RouteController::class, 'routeOptimize'])->name('routeOptimize');
//     Route::get('/tailor',[UserController::class, 'tailor'])->name('tailor');
//     Route::get('/account',[UserController::class, 'account'])->name('account');
//     Route::get('/user_edit',[UserController::class, 'userEdit'])->name('userEdit');
//     Route::get('/financial',[RevenueController::class, 'financial'])->name('financial');
//     Route::get('/report',[RevenueController::class, 'report'])->name('report');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/tmp-test', function () {
    return sys_get_temp_dir();
});

Route::get('/phpinfo', function () {
    phpinfo();
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

