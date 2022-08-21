<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Role permission routes
|--------------------------------------------------------------------------
|
| Here you can see user role permission routes.
|
*/

Route::group(['prefix' => 'panel', 'middleware' => 'auth'], static function ($router) {
    $router->resource('role-permissions', 'RolePermissionController', ['except' => 'show']); // Remove show
});
