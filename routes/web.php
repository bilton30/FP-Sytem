<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/', function () {
        if(Auth::check()) {
            return redirect('/home');
        } else {
            return view('auth.login');
        }
    });

Route::get('/clear', function() {
    Artisan::call('optimize:clear');
    return redirect()->back();
});
/*The Email Verification Notice*/
Route::get('/email/verify', function () {
    return view('auth.verify');

})->middleware('auth')->name('verification.notice');

 /*The Email Verification Handler*/
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');

})->middleware(['auth', 'signed'])->name('verification.verify');

/*Resending The Verification Email*/
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Auth::routes();

/*multitenancy routes*/
 Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::middleware(['auth'])->group(function() {
   
   

});

Route::middleware(['tenant'])->group(function() {

// Auth::routes([
//     'register' => false, // Registration Routes...
//     'reset' => false, // Password Reset Routes...
//     'verify' => false, // Email Verification Routes...
//   ]);
    // Route::get('/profile', [HomeController::class, 'index']);

Route::post('custom-update', [App\Http\Controllers\UserController::class,'customUpdate'])->name('custom-update');

Route::get('/transactions', [App\Http\Controllers\HomeController::class, 'transactions'])->name('transactions');

Route::get('/cashir', [App\Http\Controllers\HomeController::class, 'cashier'])->name('cashier');


Route::resource('users', App\Http\Controllers\UserController::class);


// Route::resource('address_districts', App\Http\Controllers\address_districtController::class);
// Route::resource('address_provinces', App\Http\Controllers\address_provinceController::class);
// Route::resource('address_neighborhoods', App\Http\Controllers\address_neighborhoodController::class);
// Route::resource('companies', App\Http\Controllers\companyController::class);
// Route::resource('customers', App\Http\Controllers\customerController::class);
// Route::resource('customer_banks', App\Http\Controllers\customer_bankController::class);
// Route::resource('customer_temp_readings', App\Http\Controllers\customer_temp_readingController::class);
// Route::resource('invoice_category_infos', App\Http\Controllers\invoice_category_infoController::class);
// Route::resource('invoice_contacts', App\Http\Controllers\invoice_contactsController::class);
// Route::resource('invoice_infos', App\Http\Controllers\invoice_infoController::class);
// Route::resource('login_fingers', App\Http\Controllers\login_fingerController::class);
// Route::resource('messages', App\Http\Controllers\messageController::class);
// Route::resource('message_balances', App\Http\Controllers\message_balanceController::class);
// Route::resource('payments', App\Http\Controllers\paymentController::class);
// Route::resource('payment_types', App\Http\Controllers\payment_typeController::class);
// Route::resource('payment_waters', App\Http\Controllers\payment_waterController::class);
// Route::resource('products', App\Http\Controllers\productController::class);
// Route::resource('tariffs', App\Http\Controllers\tariffController::class);
// Route::resource('tariff_scales', App\Http\Controllers\tariff_scaleController::class);
// Route::resource('taxes', App\Http\Controllers\taxController::class);
// Route::resource('version_dbs', App\Http\Controllers\version_dbController::class);

});