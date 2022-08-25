<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'panel', 'middleware' => 'auth'], static function ($router) {
    $router->patch('sliders/{slider}/status/active', ['uses' => 'SliderController@active', 'as' => 'sliders.active']);
    $router->patch('sliders/{slider}/status/inactive', ['uses' => 'SliderController@inactive', 'as' => 'sliders.inactive']);
    $router->resource('sliders', 'SliderController', ['except' => 'show']);
});
