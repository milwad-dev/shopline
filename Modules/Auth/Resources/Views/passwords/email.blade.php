@extends('Home::layouts.master')

@section('title', 'Forgot password')

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
                                            <h1 class="mb-5">Forgot password</h1>
                                            <p class="mb-30">You don't have account? <a href="{{ route('register') }}">Register</a></p>
                                        </div>
                                        <form method="GET" action="{{ route('password.sendVerifyCodeEmail') }}">
                                            <div class="form-group">
                                                <input class="@error('email') is-invalid @enderror" type="email"
                                                name="email" placeholder="Email" value="{{ old('email') }}">
                                                <x-share-error name="email" />
                                            </div>
                                            <div class="form-group mb-30">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold">
                                                    Submit &amp; Register
                                                </button>
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
