<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'panel', 'middleware' => 'auth'], static function ($router) {
    $router->resource('categories', 'Panel\CategoryController');
});
