@extends('Home::layouts.master')

@section('title', 'Verify account')

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
                                            <h1 class="mb-5">Verify email</h1>
                                            <p>Check the email and enter to verify code.</p>
                                        </div>
                                        <form method="POST" action="{{ route('verification.verify') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input class="@error('verify_code') is-invalid @enderror" type="number"
                                                name="verify_code" placeholder="Verify code" value="{{ old('verify_code') }}">
                                                <x-share-error name="verify_code" />
                                            </div>
                                            <div class="login_footer form-group mb-50">
                                                <a class="text-white btn" href="#"
                                                    onclick="event.preventDefault();document.getElementById('resend-code').submit()">
                                                    Send again verify code
                                                </a>
                                            </div>
                                            <div class="form-group mb-30">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold">
                                                    Continue
                                                </button>
                                            </div>
                                        </form>
                                        <form id="resend-code" action="{{ route('verification.resend') }}" method="POST">@csrf</form>
                                    </div>
                                </div>
                            </div>{{-- TODO --}}
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <div class="card-login mt-115">
                                    <a href="page-register.html#" class="social-login facebook-login">
                                        <img src="{{ asset('home/imgs/theme/icons/logo-facebook.svg') }}" alt="">
                                        <span>Continue with Facebook</span>
                                    </a>
                                    <a href="page-register.html#" class="social-login google-login">
                                        <img src="{{ asset('home/imgs/theme/icons/logo-google.svg') }}" alt="">
                                        <span>Continue with Google</span>
                                    </a>
                                    <a href="page-register.html#" class="social-login apple-login">
                                        <img src="{{ asset('home/imgs/theme/icons/logo-apple.svg') }}" alt="">
                                        <span>Continue with Apple</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
