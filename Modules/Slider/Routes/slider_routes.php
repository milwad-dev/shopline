<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'panel', 'middleware' => 'auth'], static function ($router) {
    $router->patch('sliders/{slider}/status/active', ['uses' => 'SliderController@active', 'as' => 'sliders.active']);
    $router->resource('sliders', 'SliderController', ['except' => 'show']);
});
