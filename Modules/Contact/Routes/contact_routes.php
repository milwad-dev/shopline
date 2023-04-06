<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Contact routes
|--------------------------------------------------------------------------
|
| Here you can see contact routes.
|
*/

Route::group(['prefix' => 'panel', 'middleware' => 'auth'], static function ($router) {
    $router->get('contacts', ['uses' => 'ContactController@index', 'as' => 'contacts.index']);
    $router->delete('contacts/{contact}', ['uses' => 'ContactController@destroy', 'as' => 'contacts.destroy']);
    $router->patch('contacts/{contact}/update-is-read', [
        'uses' => 'ContactController@updateIsRead',
        'as'   => 'contacts.update-is-read',
    ]);
});
