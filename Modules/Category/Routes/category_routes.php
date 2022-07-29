<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'panel', 'middleware' => 'auth', 'namespace' => 'Panel'], static function ($router) {
    $router->patch('categories/{id}/active', ['uses' => 'CategoryController@active', 'as' => 'categories.change.status.active']);
    $router->patch('categories/{id}/inactive', ['uses' => 'CategoryController@inactive', 'as' => 'categories.change.status.inactive']);
    $router->resource('categories', 'CategoryController');
});
