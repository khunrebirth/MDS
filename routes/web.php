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

Auth::routes();

Route::middleware(['auth'])->prefix('/')->group(function () {
    # Home
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');

    # Room
    Route::resource('rooms', 'RoomController');
    Route::post('rooms/search', 'RoomController@search')->name('rooms.search');
    Route::get('rooms/{id}/history', 'RoomController@history')->name('rooms.history');

    # Customer
    Route::resource('customers', 'CustomerController');
    Route::post('customers/search', 'CustomerController@search')->name('customers.search');
    Route::get('customers/{id}/invoice', 'CustomerController@invoice')->name('customers.invoice');
    Route::get('customers/{id}/invoice/detail', 'CustomerController@invoiceDetail')->name('customers.invoice.detail');

    # Meter Water
    Route::get('meters/water', 'MeterWaterController@index')->name('meters.water.home');
    Route::post('meters/water/update', 'MeterWaterController@updateAll')->name('meters.water.update.all');

    # Meter Electric
    Route::get('meters/electric', 'MeterElectricController@index')->name('meters.electric.home');
    Route::post('meters/electric/update', 'MeterElectricController@updateAll')->name('meters.electric.update.all');

    # Invoice
    Route::resource('invoices', 'InvoiceController');
    Route::get('invoices/{date}/build/by/{id}/room', 'InvoiceController@build')->name('invoices.build.by.id.room');
    Route::get('invoices/{date}/build/all', 'InvoiceController@buildAll')->name('invoices.build.all');

    # Payments
    Route::get('payments', 'PaymentController@index')->name('payments.index');
    Route::post('payments/create', 'PaymentController@create')->name('payments.create');
    Route::post('payments/create/fast', 'PaymentController@fast')->name('payments.create.fast');

//    # Report
    Route::resource('reports', 'ReportController');
    Route::post('reports/search', 'ReportController@search')->name('reports.search');

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