<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Home routes
|--------------------------------------------------------------------------
|
| Here you can see home routes.
|
*/

Route::group([], static function ($router) {
    // Home
    $router->get('/', ['uses' => 'Home\HomeController@index', 'as' => 'home.index']);
    $router->get('comming-soon', ['uses' => 'Home\HomeController@commingSoon', 'as' => 'comming-soon']);

    // Products
    $router->get('products', ['uses' => 'Product\ProductController@index', 'as' => 'products.home']);
    $router->get('products/{sku}/d/{slug}', ['uses' => 'Product\ProductController@details', 'as' => 'products.details']);
});
