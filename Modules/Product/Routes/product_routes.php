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
    $router->resource('products', 'ProductController', ['except' => 'show']);
});
