@extends('Home::layouts.master')

@section('title', 'Verify email for reset password')

@section('content')
    <main class="main pages">
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Verify email for reset password</h1>
                                            <p class="mb-30">You don't have account? <a href="{{ route('register') }}">Register</a></p>
                                        </div>
                                        <form method="POST" action="{{ route('password.checkVerifyCode') }}">
                                            @csrf
                                            <input type="hidden" name="email" value="{{ request()->email }}">
                                            <div class="form-group">
                                                <input class="@error('verify_code') is-invalid @enderror" type="number"
                                                name="verify_code" placeholder="Verify code" value="{{ old('verify_code') }}">
                                                @error('verify_code')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
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
                                        <form id="resend-code" action="{{ route('password.sendVerifyCodeEmail', request()->email) }}" method="GET"></form>
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
