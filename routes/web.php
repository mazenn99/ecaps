<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin'], function () {
    Route::view('login', 'admin.login')->name('admin.login.view');
    Route::post('login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');

    // all invest
    Route::view('all_invest' , 'admin.invest.all_invest')->name('all_invest_user');


    /*
     * Dashboard
     */

    Route::middleware('auth:admin')->group(function () {
        Route::resource('dashboard', \App\Http\Controllers\Admin\DashboardController::class);

        /*
         * Admin
         */

        Route::resource('admin', \App\Http\Controllers\Admin\AdminController::class);

        /*
        * Invest
        */

        Route::resource('invest', \App\Http\Controllers\Admin\InvestorController::class);

        Route::post('invest_store' , [\App\Http\Controllers\Admin\InvestorController::class , 'storeInvest'])->name('invest.share.store');

        Route::get('add_invest/{id}' , [\App\Http\Controllers\Admin\InvestorController::class , 'investHistory'])->name('add-invest');

    });
});



Route::group(['middleware' => 'guest'] , function() {
    // login view & controller
   Route::view('/' , 'user.login')->name('user.login.view');
   Route::post('login' , [\App\Http\Controllers\User\LoginController::class , 'login'])->name('user.login');
});


Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('dash', [\App\Http\Controllers\User\DashboardController::class , 'dashboard'])->name('user.dashboard');
});

Route::post('logout' , [\App\Http\Controllers\User\DashboardController::class , 'logout'])->name('logout');
