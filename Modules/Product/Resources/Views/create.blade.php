@extends('Panel::layouts.master')

@section('title', 'New product')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/plugins/forms/form-wizard.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <x-panel-content-header title="Create new product">
                <li class="breadcrumb-item active">
                    Create product
                </li>
            </x-panel-content-header>
            <div class="content-body">
                <section class="horizontal-wizard">
                    <div class="bs-stepper horizontal-wizard-example">
                        <div class="bs-stepper-header" role="tablist">
{{--                            <x-panel-step number="1" id="main-product-data" title="First" subtitle="Enter the main product data" />--}}
                            <div class="step" data-target="#account-details" role="tab" id="main-product-data">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">1</span>
                                    <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">First</span>
                                        <span class="bs-stepper-subtitle">Enter the main product data</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#personal-info" role="tab" id="personal-info-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">2</span>
                                    <span class="bs-stepper-label">
            <span class="bs-stepper-title">Personal Info</span>
            <span class="bs-stepper-subtitle">Add Personal Info</span>
          </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#address-step" role="tab" id="address-step-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">3</span>
                                    <span class="bs-stepper-label">
            <span class="bs-stepper-title">Address</span>
            <span class="bs-stepper-subtitle">Add Address</span>
          </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#social-links" role="tab" id="social-links-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">4</span>
                                    <span class="bs-stepper-label">
            <span class="bs-stepper-title">Social Links</span>
            <span class="bs-stepper-subtitle">Add Social Links</span>
          </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form action="{{ route('products.store') }}" method="POST">
                                @csrf
                                <div id="account-details" class="content" role="tabpanel" aria-labelledby="main-product-data">
                                    <div class="content-header">
                                        <h5 class="mb-0">Account Details</h5>
                                        <small class="text-muted">Enter Your Account Details.</small>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="text" name="username" id="username" class="form-control" placeholder="johndoe" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="email">Email</label>
                                                <input
                                                    type="email"
                                                    name="email"
                                                    id="email"
                                                    class="form-control"
                                                    placeholder="john.doe@email.com"
                                                    aria-label="john.doe"
                                                />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 form-password-toggle col-md-6">
                                                <label class="form-label" for="password">Password</label>
                                                <input
                                                    type="password"
                                                    name="password"
                                                    id="password"
                                                    class="form-control"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                />
                                            </div>
                                            <div class="mb-1 form-password-toggle col-md-6">
                                                <label class="form-label" for="confirm-password">Confirm Password</label>
                                                <input
                                                    type="password"
                                                    name="confirm-password"
                                                    id="confirm-password"
                                                    class="form-control"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                />
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-outline-secondary btn-prev" disabled>
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </button>
                                    </div>
                                </div>
                                <div id="personal-info" class="content" role="tabpanel" aria-labelledby="personal-info-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0">Personal Info</h5>
                                        <small>Enter Your Personal Info.</small>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="first-name">First Name</label>
                                                <input type="text" name="first-name" id="first-name" class="form-control"
                                                       placeholder="John" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="last-name">Last Name</label>
                                                <input type="text" name="last-name" id="last-name" class="form-control" placeholder="Doe" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="country">Country</label>
                                                <select class="select2 w-100" name="country" id="country">
                                                    <option label=" "></option>
                                                    <option>UK</option>
                                                    <option>USA</option>
                                                    <option>Spain</option>
                                                    <option>France</option>
                                                    <option>Italy</option>
                                                    <option>Australia</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="language">Language</label>
                                                <select class="select2 w-100" name="language" id="language" multiple>
                                                    <option>English</option>
                                                    <option>French</option>
                                                    <option>Spanish</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </button>
                                    </div>
                                </div>
                                <div id="address-step" class="content" role="tabpanel" aria-labelledby="address-step-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0">Address</h5>
                                        <small>Enter Your Address.</small>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="address">Address</label>
                                                <input
                                                    type="text"
                                                    id="address"
                                                    name="address"
                                                    class="form-control"
                                                    placeholder="98  Borough bridge Road, Birmingham"
                                                />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="landmark">Landmark</label>
                                                <input type="text" name="landmark" id="landmark" class="form-control" placeholder="Borough bridge" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="pincode1">Pincode</label>
                                                <input type="text" id="pincode1" class="form-control" placeholder="658921" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="city1">City</label>
                                                <input type="text" id="city1" class="form-control" placeholder="Birmingham" />
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </button>
                                    </div>
                                </div>
                                <div id="social-links" class="content" role="tabpanel" aria-labelledby="social-links-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0">Social Links</h5>
                                        <small>Enter Your Social Links.</small>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="twitter">Twitter</label>
                                                <input
                                                    type="text"
                                                    id="twitter"
                                                    name="twitter"
                                                    class="form-control"
                                                    placeholder="https://twitter.com/abc"
                                                />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="facebook">Facebook</label>
                                                <input
                                                    type="text"
                                                    id="facebook"
                                                    name="facebook"
                                                    class="form-control"
                                                    placeholder="https://facebook.com/abc"
                                                />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="google">Google+</label>
                                                <input
                                                    type="text"
                                                    id="google"
                                                    name="google"
                                                    class="form-control"
                                                    placeholder="https://plus.google.com/abc"
                                                />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="linkedin">Linkedin</label>
                                                <input
                                                    type="text"
                                                    id="linkedin"
                                                    name="linkedin"
                                                    class="form-control"
                                                    placeholder="https://linkedin.com/abc"
                                                />
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button class="btn btn-success btn-submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('panel/js/scripts/forms/form-wizard.min.js') }}"></script>
    <script src="{{ asset('panel/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('panel/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('panel/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
@endsection
