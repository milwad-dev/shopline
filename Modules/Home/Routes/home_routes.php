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
    $router->get('/', ['uses' => 'HomeController@index', 'as' => 'home.index']);
    $router->get('comming-soon', ['uses' => 'HomeController@commingSoon', 'as' => 'comming-soon']);
});
