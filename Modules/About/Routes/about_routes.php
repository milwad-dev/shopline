<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| About routes
|--------------------------------------------------------------------------
|
| Here you can see about routes.
|
*/

Route::group(['prefix' => 'panel', 'middleware' => 'auth'], static function ($router) {
    $router->resource('abouts', 'AboutController', ['except' => ['show', 'destroy']]);
});
