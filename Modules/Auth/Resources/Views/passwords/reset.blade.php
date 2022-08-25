@extends('Home::Home.layouts.master')

@section('title', 'Reset password')

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
                                            <h1 class="mb-5">Reset password</h1>
                                            <p class="mb-30">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                                        </div>
                                        <form method="POST" action="{{ route('password.update') }}">
                                            @csrf
                                            <div class="form-group">
                                                <x-auth-input name="password" id="password" type="password" placeholder="Password" />
                                                <x-share-error name="password" />
                                                @include('Share::password-rules')
                                            </div>
                                            <div class="form-group">
                                                <x-auth-input name="password_confirmation" id="password_confirmation"
                                                type="password" placeholder="Confirm password" />
                                            </div>
                                            <div class="form-group mb-30">
                                                <x-auth-button title="Save & Continue" />
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
