@extends('Home::Home.layouts.master')

@section('title', 'Products')

@section('content')
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Products</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home.index') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="slider-1 slider-animate product-wrapper no-arrow">
                        <div>
                            <div class="banner-contain-2 hover-effect">
                                <img src="{{ asset('home/images/shop/1.jpg') }}" class="bg-img rounded-3 blur-up lazyload" alt="">
                                <div
                                    class="banner-detail p-center-right position-relative shop-banner ms-auto banner-small">
                                    <div>
                                        <h2>Healthy, nutritious & Tasty Fruits & Veggies</h2>
                                        <h3>Save upto 50%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="banner-contain-2 hover-effect">
                                <img src="../assets/images/shop/1.jpg" class="bg-img rounded-3 blur-up lazyload" alt="">
                                <div
                                    class="banner-detail p-center-right position-relative shop-banner ms-auto banner-small">
                                    <div>
                                        <h2>Healthy, nutritious & Tasty Fruits & Veggies</h2>
                                        <h3>Save upto 50%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="banner-contain-2 hover-effect">
                                <img src="../assets/images/shop/1.jpg" class="bg-img rounded-3 blur-up lazyload" alt="">
                                <div
                                    class="banner-detail p-center-right position-relative shop-banner ms-auto banner-small">
                                    <div>
                                        <h2>Healthy, nutritious & Tasty Fruits & Veggies</h2>
                                        <h3>Save upto 50%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-b-space shop-section">
        <div class="container-fluid-lg">
            <div class="row">
                @include('Home::Pages.products.section.main-page.filter')
                @include('Home::Pages.products.section.main-page.products')
            </div>
        </div>
    </section>
@endsection

