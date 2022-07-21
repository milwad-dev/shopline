<?php

use Illuminate\Support\Facades\Route;

Route::group([], static function ($router) {
    // Register
    $router->get('register', 'RegisterController@view')->name('register');
    $router->post('register', 'RegisterController@register')->name('register');

    // Login
    $router->get('login', 'LoginController@view')->name('login');
    $router->post('login', 'LoginController@login')->name('login');

    // Verification
    $router->get('email/verify', 'VerificationController@view')->name('verification.notice');
    $router->post('email/verify', 'VerificationController@verify')->name('verification.verify');
    $router->post('email/resend', 'VerificationController@resend')->name('verification.resend');

    // Logout
    $router->any('logout', 'LogoutController')->name('logout');
});
