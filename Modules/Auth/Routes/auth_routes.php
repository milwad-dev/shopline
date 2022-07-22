<?php

use Illuminate\Support\Facades\Route;

Route::group([], static function ($router) {
    // Logout
    $router->any('logout', 'LogoutController')->name('logout');

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

    // Forgot Password
    $router->get('password/reset', 'ForgotPasswordController@showVerifyCodeRequestForm')->name('password.request');
    $router->get('password/reset/send', 'ForgotPasswordController@sendVerifyCodeEmail')->name('password.sendVerifyCodeEmail');
    $router->post('password/reset/check-verify-code', 'ForgotPasswordController@checkVerifyCode')->name('password.checkVerifyCode')
    ->middleware('throttle:5,1');

    // Reset Password
    $router->get('password/change', 'ResetPasswordController@view')->name('password.showResetForm')->middleware('auth');
    $router->post('password/change', 'ResetPasswordController@reset')->name('password.update')->middleware('throttle:3,1');
});
