<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\PropertyController;
use App\http\Controllers\VouncherController;
use Illuminate\Support\Facades\Redirect;

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

Route::get('login', [LoginController::class, 'login']);
Route::post('login_data', [LoginController::class, 'login_data']);


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () use ($router) {

    //Dashboard
    Route::get('dashboard', [DashboardController::class, 'dashboard']);

    //logout
    Route::get('logout', [LoginController::class, 'logout']);

    //property
    // Route::any('{data}',PropertyController::class)->where('data', 'view_property|add_property|edit_property');

    Route::get('view_property',[PropertyController::class,'view_property']);
    Route::post('add_property', [PropertyController::class, 'add_property']);
    Route::post('edit_property', [PropertyController::class, 'edit_property']);

    //voucher
    Route::get('view_vouchers', [VouncherController::class, 'view_vouchers']);
    Route::post('add_voucher', [VouncherController::class, 'add_voucher']);
    Route::post('edit_voucher', [VouncherController::class, 'edit_voucher']);
    Route::get('voucher_detail/{id}', [VouncherController::class, 'voucher_detail']);
    Route::get('download_voucher/{id}', [VouncherController::class, 'download_voucher']);

});