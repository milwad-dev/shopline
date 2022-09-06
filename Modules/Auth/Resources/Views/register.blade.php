@extends('Home::Home.layouts.master')

@section('title', 'Register')

@section('content')
    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                @include('Auth::section.image', ['image' => asset('home/images/inner-page/sign-up.png')])
                <div class="col-xxl-4 col-xl-5 col-lg-6 me-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To {{ config('app.name') }}</h3>
                            <h4>Register new account</h4>
                        </div>
                        <div class="input-box">
                            <form class="row g-4" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <x-auth-input name="name" id="name" value="{{ old('name') }}" placeholder="Name" />
                                        <x-share-error name="name" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <x-auth-input name="email" id="email" value="{{ old('email') }}" type="email"
                                        placeholder="Email" />
                                        <x-share-error name="email" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <x-auth-input name="phone" id="phone" value="{{ old('phone') }}"
                                        type="number" placeholder="Phone" />
                                        <x-share-error name="phone" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <x-auth-input name="password" id="password" type="password" placeholder="Password" />
                                        <x-share-error name="password" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input name="type" id="type" type="checkbox" value="customer" />  Customer
                                        <input name="type" id="type" type="radio" value="vendor" />  Vendor
                                        <x-share-error name="type" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="forgot-box">
                                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <x-auth-button title="Register" />
                                </div>
                            </form>
                        </div>
                        <div class="other-log-in">
                            <h6>or</h6>
                        </div>
                        @include('Auth::section.login-social')
                        <div class="other-log-in">
                            <h6></h6>
                        </div>
                        <div class="sign-up-box">
                            <h4>Already have an account?</h4>
                            <a href="{{ route('login') }}">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
