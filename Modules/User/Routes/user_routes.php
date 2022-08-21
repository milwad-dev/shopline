<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User routes
|--------------------------------------------------------------------------
|
| Here you can see user routes.
|
*/

Route::group(['middleware' => 'auth', 'prefix' => 'panel'], static function ($router) {
    $router->resource('users', 'UserController', ['except' => 'show']);
});
