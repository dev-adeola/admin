<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::get('clientdetail/{uuid}', 'ClientsController@clientDetails');
    Route::get('clients', 'ClientsController@index')->name('page.clients.index');
    Route::post('client/block', 'ClientsController@blockClient')->name('page.clients.blockClient');
    Route::post('client/unblock', 'ClientsController@unblockClient')->name('page.clients.unblockClient');
    Route::post('client/activate', 'ClientsController@activateClient')->name('page.clients.activateClient');
    Route::get('zoommerdetail/{uuid}', 'ZoommersController@ZoommersDetails');
    Route::get('zoommers', 'ZoommersController@index')->name('page.zoommers.index');
    Route::post('zoommers/block', 'ZoommersController@blockZoommers')->name('page.zoommers.blockZoommers');
    Route::post('zoommers/unblock', 'ZoommersController@unblockZoommers')->name('page.zoommers.unblockZoommers');
    Route::post('zoommers/activate', 'ZoommersController@activateZoommers')->name('page.zoommers.activateZoommers');
    Route::get('hub', 'HubController@index')->name('page.hub.index');
    Route::get('courier', 'CourierController@index')->name('page.courier.index');
    Route::crud('inbox', 'InboxCrudController');
    Route::crud('notification', 'NotificationCrudController');
    Route::get('price', 'PriceController@index')->name('page.price.index');
    Route::post('price', 'PriceController@EditPrice')->name('page.price.edit-price');
    Route::get('negotiation', 'PriceController@Negotiation');
    Route::post('negotiation/reference', 'PriceController@checkUsername')->name('page.price.reference');
    Route::post('negotiation/adjust', 'PriceController@AdjustPrice')->name('page.price.adjust');
    Route::get('notification', 'NotificationController@index')->name('page.notification.index');
    Route::post('notify', 'NotificationController@Notify')->name('page.notification.notify');
    Route::get('account', 'AccountController@index')->name('page.account.index');
}); // this should be the absolute last line of this file