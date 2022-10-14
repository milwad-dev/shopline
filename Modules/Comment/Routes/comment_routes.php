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
    $router->get('comments', ['uses' => 'CommentController@index', 'as' => 'comments.index']);
    $router->delete('comments/{comment}', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
});
