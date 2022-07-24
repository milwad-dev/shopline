@extends('Home::layouts.master')

@section('title', 'Register')

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
                                            <h1 class="mb-5">Create an Account</h1>
                                            <p class="mb-30">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                                        </div>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <x-auth-input name="name" id="name" value="{{ old('name') }}"
                                                placeholder="Name" />
                                                <x-share-error name="name" />
                                            </div>
                                            <div class="form-group">
                                                <x-auth-input name="email" id="email" value="{{ old('email') }}" type="email"
                                                placeholder="Email" />
                                                <x-share-error name="email" />
                                            </div>
                                            <div class="form-group">
                                                <x-auth-input name="phone" id="phone" value="{{ old('phone') }}" type="number"
                                                placeholder="Phone" />
                                                <x-share-error name="phone" />
                                            </div>
                                            <div class="form-group">
                                                <x-auth-input name="password" id="password" value="{{ old('password') }}"
                                                type="password" placeholder="Password" />
                                                <x-share-error name="password" />
                                                <p>
                                                    Password must have a capital & lower letters with number & special character(Milwad123!).
                                                </p>
                                            </div>
                                            <div class="payment_option mb-50">
                                                <div class="custome-radio">
                                                    <input class="form-check-input" type="radio" name="type"
                                                    id="typeCustomer" checked value="customer">
                                                    <label class="form-check-label" for="typeCustomer" data-bs-toggle="collapse"
                                                        data-target="#bankTranfer" aria-controls="bankTranfer">
                                                        I am a customer
                                                    </label>
                                                </div>
                                                <div class="custome-radio">
                                                    <input class="form-check-input" type="radio" name="type"
                                                    id="typeVendor" checked value="vendor">
                                                    <label class="form-check-label" for="typeVendor" data-bs-toggle="collapse"
                                                       data-target="#checkPayment" aria-controls="checkPayment">
                                                        I am a vendor
                                                    </label>
                                                </div>
                                                @if ($errors->has('type'))
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $errors->first('type') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="policy"
                                                        id="policy" value="1">
                                                        <label class="form-check-label" for="policy">
                                                            <span>I agree to terms &amp; Policy.</span>
                                                        </label>
                                                    </div>
                                                    @if ($errors->has('policy'))
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $errors->first('policy') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>{{-- TODO --}}
                                                <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
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
                            @include('Auth::section.login-social')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
