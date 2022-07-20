<?php

use Illuminate\Support\Facades\Route;

Route::group([], static function ($router) {
    // Captcha
    $router->get('refresh-captcha', 'RegisterController@refreshCaptcha')->name('refresh-captcha');

    // Register
    $router->get('register', 'RegisterController@view')->name('register');
    $router->post('register', 'RegisterController@register')->name('register');

    // Login
    $router->get('login', 'LoginController@view')->name('login');
    $router->post('login', 'LoginController@login')->name('login');
});
