@extends('Home::Home.layouts.master')

@section('title', 'Contact us')

@section('content')
    <section class="contact-box-section">
        <div class="container-fluid-lg">
            <div class="row g-lg-5 g-3">
                <div class="col-xxl-6">
                    <div class="left-sidebar-box">
                        <div class="contact-image">
                            <img src="{{ asset('home/images/inner-page/contact-us.png') }}" class="img-fluid blur-up lazyloaded"
                                 alt="contact-us img">
                        </div>
                        <div class="contact-title">
                            <h3>Get In Touch</h3>
                        </div>
                        <div class="contact-detail">
                            <div class="row g-4">
                                <div class="col-sm-6">
                                    <div class="contact-detail-box">
                                        <div class="contact-icon">
                                            <i data-feather="phone"></i>
                                        </div>
                                        <div class="contact-detail-title">
                                            <h4>Phone</h4>
                                        </div>
                                        <div class="contact-detail-contain">
                                            <p>{{ config('app.phone') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="contact-detail-box">
                                        <div class="contact-icon">
                                            <i data-feather="mail"></i>
                                        </div>
                                        <div class="contact-detail-title">
                                            <h4>Email</h4>
                                        </div>
                                        <div class="contact-detail-contain">
                                            <p>{{ config('app.email') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6">
                    <div class="title d-xxl-none d-block">
                        <h2>Contact Us</h2>
                    </div>
                    <div class="right-sidebar-box">
                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xxl-6 col-md-6">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="name" class="form-label">Name</label>
                                        <div class="custom-input">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Enter Name" autofocus value="{{ old('name') }}">
                                            <x-share-error name="name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="custom-input">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                                            <x-share-error name="email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="subject" class="form-label">Subject</label>
                                        <div class="custom-input">
                                            <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                            id="subject" name="subject" placeholder="Enter Subject" value="{{ old('subject') }}">
                                            <x-share-error name="subject" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="phone" class="form-label">Phone</label>
                                        <div class="custom-input">
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" placeholder="Enter Phone" value="{{ old('phone') }}">
                                            <x-share-error name="phone" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="message" class="form-label">Message</label>
                                        <div class="custom-textarea">
                                            <textarea class="form-control @error('message') is-invalid @enderror"
                                            id="message" name="message" placeholder="Enter Your Message"
                                            rows="4">{{ old('message') }}</textarea>
                                            <x-share-error name="message" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-animation btn-md fw-bold ms-auto">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
