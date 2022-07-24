@extends('Home::layouts.master')

@section('title', 'Login')

@section('content')
    <main class="main pages">
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Login</h1>
                                            <p class="mb-30">
                                                Don't have an account?
                                                <a href="{{ route('register') }}">Create here</a>
                                            </p>
                                        </div>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <x-auth-input name="email" id="email" value="{{ old('email') }}"
                                                placeholder="Email or phone" />
                                                <x-share-error name="email" />
                                            </div>
                                            <div class="form-group">
                                                <x-auth-input type="password" name="password" id="password" placeholder="Password" />
                                                <x-share-error name="password" />
                                            </div>
                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                                        <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                                            </div>
                                            <div class="form-group mb-30">
                                                <x-share-button title="Login" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
