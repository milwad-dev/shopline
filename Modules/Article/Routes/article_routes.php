<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'panel', 'middleware' => 'auth'], static function ($router) {
    $router->patch('articles/{id}/change/status/{status}', 'ArticleController@changeStatus')->name('articles.change.status');
    $router->resource('articles', 'ArticleController');
});
