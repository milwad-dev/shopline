<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'panel'], static function ($router) {
    $router->get('index', ['uses' => 'PanelController', 'as' => 'panel.index']);
});
