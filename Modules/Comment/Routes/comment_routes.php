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
    $router->get('comments', ['uses' => 'CommentController@index', 'as' => 'comment.index']);
    $router->delete('comments/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comment.destroy']);
});
