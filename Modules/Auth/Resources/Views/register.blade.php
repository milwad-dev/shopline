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
                                                <input class="@error('name') is-invalid @enderror" type="text"
                                                name="name" placeholder="Name" value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input class="@error('email') is-invalid @enderror" type="email"
                                                name="email" placeholder="Email" value="{{ old('email') }}">
                                                @error('email')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input class="@error('phone') is-invalid @enderror" type="number"
                                                name="phone" placeholder="Phone" value="{{ old('phone') }}">
                                                @error('phone')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input class="@error('password') is-invalid @enderror" type="password"
                                                name="password" placeholder="Password">
                                                @error('password')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
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
