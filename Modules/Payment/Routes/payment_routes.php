<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Payment routes
|--------------------------------------------------------------------------
|
| Here you can see payments routes.
|
*/

Route::group(['prefix' => 'panel', 'middleware' => 'auth'], static function ($router) {
    $router->any('payments/callback', ['uses' => 'PaymentController@callback', 'as' => 'payment.callback']);
    $router->get('payments', ['uses' => 'PaymentController@index', 'as' => 'payments.index']);
    $router->get('purchases', ['uses' => 'PaymentController@purchases', 'as' => 'purchases.index']);
});
