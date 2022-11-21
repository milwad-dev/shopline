<?php

use Illuminate\Support\Facades\Route;

/**
 * Discount routes.
 */
Route::group(['prefix' => 'panel', 'middleware' => 'auth'], static function ($router) {
    $router->resource('discounts', 'DiscountController');
});
