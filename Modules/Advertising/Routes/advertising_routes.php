<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Advertising routes
|--------------------------------------------------------------------------
|
| Here you can see advertising routes.
|
*/

Route::group(['middleware' => 'auth', 'prefix' => 'panel'], static function ($router) {
    $router->patch(
        'advertisings/{id}/update/status/{status}',
        ['uses' => 'AdvertisingController@updateStatus', 'as' => 'advertisings.update.status',
        ]
    );
    $router->resource('advertisings', 'AdvertisingController', ['except' => 'show']);
});
