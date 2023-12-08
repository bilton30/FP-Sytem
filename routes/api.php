<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('londlord')->group(function() {
    // Route::get('/', [HomeController::class, 'index']);

});
// Route::middleware('tenant')->group(function() {
// Route::get('/', [HomeController::class, 'index']);
   


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::resource('address_district', App\Http\Controllers\API\address_districtAPIController::class)
    ->except(['create', 'edit']);

Route::resource('address_province', App\Http\Controllers\API\address_provinceAPIController::class)
    ->except(['create', 'edit']);

Route::resource('address_neighborhood', App\Http\Controllers\API\address_neighborhoodAPIController::class)
    ->except(['create', 'edit']);

Route::resource('companies', App\Http\Controllers\API\companyAPIController::class)
    ->except(['create', 'edit']);

Route::resource('customer', App\Http\Controllers\API\customerAPIController::class)
    ->except(['create', 'edit']);

Route::resource('customer_bank', App\Http\Controllers\API\customer_bankAPIController::class)
    ->except(['create', 'edit']);

Route::resource('customer_temp_reading', App\Http\Controllers\API\customer_temp_readingAPIController::class)
    ->except(['create', 'edit']);

Route::resource('invoice_category_info', App\Http\Controllers\API\invoice_category_infoAPIController::class)
    ->except(['create', 'edit']);

Route::resource('invoice_contact', App\Http\Controllers\API\invoice_contactsAPIController::class)
    ->except(['create', 'edit']);

Route::resource('invoice_info', App\Http\Controllers\API\invoice_infoAPIController::class)
    ->except(['create', 'edit']);

Route::resource('login_finger', App\Http\Controllers\API\login_fingerAPIController::class)
    ->except(['create', 'edit']);

Route::resource('message', App\Http\Controllers\API\messageAPIController::class)
    ->except(['create', 'edit']);

Route::resource('message_balance', App\Http\Controllers\API\message_balanceAPIController::class)
    ->except(['create', 'edit']);

// Route::resource('payment', App\Http\Controllers\API\paymentAPIController::class)
    // ->except(['create', 'edit']);

Route::resource('payment_type', App\Http\Controllers\API\payment_typeAPIController::class)
    ->except(['create', 'edit']);

Route::resource('payment_water', App\Http\Controllers\API\payment_waterAPIController::class)
    ->except(['create', 'edit']);

Route::resource('product', App\Http\Controllers\API\productAPIController::class)
    ->except(['create', 'edit']);

Route::resource('tariff', App\Http\Controllers\API\tariffAPIController::class)
    ->except(['create', 'edit']);

Route::resource('tariff_scale', App\Http\Controllers\API\tariff_scaleAPIController::class)
    ->except(['create', 'edit']);

Route::resource('tax', App\Http\Controllers\API\taxAPIController::class)
    ->except(['create', 'edit']);

Route::resource('version_db', App\Http\Controllers\API\version_dbAPIController::class)
    ->except(['create', 'edit']);


// });