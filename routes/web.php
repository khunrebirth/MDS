<?php

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

Route::prefix('/')->group(function () {
    # Home
    Route::get('/', 'HomeController@index')->name('home');

    # Room
    Route::get('rooms', 'RoomController@index')->name('rooms');

    # Customer
    Route::get('customers', 'CustomerController@index')->name('customers');

    # Meter Water
    Route::get('meter/water', 'MeterWaterController@index')->name('meter.weters');

    # Meter Electric
    Route::get('meter/electric', 'MeterElectricController@index')->name('meter.electrics');

    # Invoice
    Route::get('invoices', 'InvoiceController@index')->name('invoices');

    # Report
    Route::get('reports', 'ReportController@index')->name('reports');

    # Setting
    Route::get('settings', 'SettingController@index')->name('settings');
});
