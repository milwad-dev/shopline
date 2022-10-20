<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Cart routes
|--------------------------------------------------------------------------
|
| Here you can see cart routes.
|
*/

Route::group(['middleware' => 'auth'], static function ($router) {
    $router->get('cart-add/{id}', ['uses' => 'CartController@add', 'as' => 'cart.add']);
    $router->get('cart-add/{id}/delete', ['uses' => 'CartController@delete', 'as' => 'cart.delete']);
});
