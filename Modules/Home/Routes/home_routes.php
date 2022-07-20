<?php

use Illuminate\Support\Facades\Route;

Route::group([], static function ($router) {
    $router->get('/', 'HomeController@index')->name('home.index');
});
