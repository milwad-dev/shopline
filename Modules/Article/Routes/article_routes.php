<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'panel'], static function ($router) {
    $router->resource('articles', 'ArticleController');
});
