<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => 'panel'], static function ($router) {
    $router->resource('users', 'Panel\UserController');
});
