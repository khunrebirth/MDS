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
    Route::resource('rooms', 'RoomController');

    # Customer
    Route::resource('customers', 'CustomerController');

    # Meter Water
//    Route::resource('meter/waters', 'MeterWaterController');

    # Meter Electric
//    Route::resource('meter/electrics', 'MeterElectricController');

    # Invoice
    Route::resource('invoices', 'InvoiceController');

    # Report
    Route::resource('reports', 'ReportController');

    # Setting
    Route::resource('settings', 'SettingController');
});

# Ajax
Route::group(['prefix' => '/ajax', 'as' => 'ajax.'], function () {

    # Room
    Route::get('room/by/id', 'Ajax\RoomController@getRoomById')->name('get.room.by.id');

});