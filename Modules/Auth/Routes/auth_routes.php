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

    // Verification
    $router->post('email/verify', 'VerificationController@verify')->name('verification.verify');
    $router->post('email/resend', 'VerificationController@resend')->name('verification.resend');
    $router->get('email/verify', 'VerificationController@show')->name('verification.notice');
});
