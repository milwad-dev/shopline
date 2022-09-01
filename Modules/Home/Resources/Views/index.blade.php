@extends('Home::Home.layouts.master')

@section('title', 'Home page')

@section('content')
    @include('Home::Home.parts.sliders', [
         'sliders' => $homeRepo->getLatestSliders(),
         'adv' => $homeRepo->getOneLatestAdvByLocation(Modules\Advertising\Enums\AdvertisingLocationEnum::LOCATION_SLIDER->value)->first()
     ])
    @include('Home::Home.parts.categories')
    @include('Home::Home.parts.discount')
    @include('Home::Home.parts.latest-products')
    @include('Home::Home.parts.top-products')

    <!-- Blog Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Featured Blog</h2>
                <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                <p>A virtual assistant collects the products from your list</p>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-5 ratio_87">
                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <a href="blog-detail.html" class="blog-image">
                                        <img src="../assets/images/veg-2/blog/1.jpg" class="bg-img blur-up lazyload"
                                             alt="">
                                    </a>
                                </div>

                                <div class="blog-detail">
                                    <h6>Farmart</h6>
                                    <h5>Fresh Meat Saugage</h5>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <a href="blog-detail.html" class="blog-image">
                                        <img src="../assets/images/veg-2/blog/2.jpg" class="bg-img blur-up lazyload"
                                             alt="">
                                    </a>
                                </div>

                                <a href="blog-detail.html" class="blog-detail">
                                    <h6>Soda Brand</h6>
                                    <h5>Soda 500ml - 20% OFF</h5>
                                </a>
                            </div>
                        </div>

                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <a href="blog-detail.html" class="blog-image">
                                        <img src="../assets/images/veg-2/blog/3.jpg" class="bg-img blur-up lazyload"
                                             alt="">
                                    </a>
                                </div>

                                <a href="blog-detail.html" class="blog-detail">
                                    <h6>Beer Brand</h6>
                                    <h5>Soda 500ml - 20% OFF</h5>
                                </a>
                            </div>
                        </div>

                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <a href="blog-detail.html" class="blog-image">
                                        <img src="../assets/images/veg-2/blog/4.jpg" class="bg-img blur-up lazyload"
                                             alt="">
                                    </a>
                                </div>

                                <a href="blog-detail.html" class="blog-detail">
                                    <h6>Beer Brand</h6>
                                    <h5>Fresh Beer -30% OFF</h5>
                                </a>
                            </div>
                        </div>

                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <a href="blog-detail.html" class="blog-image">
                                        <img src="../assets/images/veg-2/blog/5.jpg" class="bg-img blur-up lazyload"
                                             alt="">
                                    </a>
                                </div>

                                <a href="blog-detail.html" class="blog-detail">
                                    <h6>Milk Brand</h6>
                                    <h5>Fresh Milk</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Newsletter Section Start -->
    <section class="newsletter-section section-b-space">
        <div class="container-fluid-lg">
            <div class="newsletter-box newsletter-box-2">
                <div class="newsletter-contain py-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-4 col-sm-8 offset-xl-3">
                                <div class="newsletter-detail">
                                    <h2>Join our newsletter and get...</h2>
                                    <h5>$20 discount for your first order</h5>
                                    <div class="input-box">
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                               placeholder="Enter Your Email">
                                        <i class="fa-solid fa-envelope arrow"></i>
                                        <button class="sub-btn btn">
                                            <span class="d-sm-block d-none">Subscribe</span>
                                            <i class="fa-solid fa-arrow-right icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Section End -->
@endsection
