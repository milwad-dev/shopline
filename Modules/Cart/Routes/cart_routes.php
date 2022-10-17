<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Product routes
|--------------------------------------------------------------------------
|
| Here you can see product routes.
|
*/

Route::group(['prefix' => 'panel', 'middleware' => 'auth'], static function ($router) {
    $router->get('cart-add/{product-id}', ['uses' => 'CartController@add', 'as' => 'cart.add']);
});
