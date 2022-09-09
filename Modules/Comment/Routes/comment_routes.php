<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Comment routes
|--------------------------------------------------------------------------
|
| Here you can see comment routes.
|
*/

Route::group(['prefix' => 'panel', 'middleware' => 'auth'], static function ($router) {
    $router->resource('comments', 'CommentController', ['except' => 'show']);
});
