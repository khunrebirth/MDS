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
    Route::post('rooms/search', 'RoomController@search')->name('rooms.search');

    # Customer
    Route::resource('customers', 'CustomerController');
    Route::post('customers/search', 'CustomerController@search')->name('customers.search');
    Route::get('customers/{id}/invoice', 'CustomerController@invoice')->name('customers.invoice');
    Route::get('customers/{id}/invoice/detail', 'CustomerController@invoiceDetail')->name('customers.invoice.detail');

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
    Route::post('settings/update/all', 'SettingController@updateAll')->name('settings.update.all');
});

# Ajax
Route::group(['prefix' => '/ajax', 'as' => 'ajax.'], function () {

    # Room
    Route::get('room/by/id', 'Ajax\RoomController@getRoomById')->name('get.room.by.id');

    # Customer
    Route::get('customer/by/id', 'Ajax\CustomerController@getCustomerById')->name('get.customer.by.id');
});