<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified']], static function ($router) {
    $router->get('media/{media}/download', 'MediaController@download')->name('media.download');
});
