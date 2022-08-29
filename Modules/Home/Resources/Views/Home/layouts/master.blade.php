<!DOCTYPE html>
<html lang="en">
    <head>
        @include('Home::Home.section.meta') {{-- Include meta tags --}}

        <title>@yield('title') - {{ config('app.name') }}</title>

        @include('Home::Home.section.css') {{-- Include css links --}}
    </head>
    <body>
        <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        <figure class="border-radius-10">
                                            <img src="assets/imgs/shop/product-16-2.jpg" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="assets/imgs/shop/product-16-1.jpg" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="assets/imgs/shop/product-16-3.jpg" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="assets/imgs/shop/product-16-4.jpg" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="assets/imgs/shop/product-16-5.jpg" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="assets/imgs/shop/product-16-6.jpg" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="assets/imgs/shop/product-16-7.jpg" alt="product image" />
                                        </figure>
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails">
                                        <div><img src="assets/imgs/shop/thumbnail-3.jpg" alt="product image" /></div>
                                        <div><img src="assets/imgs/shop/thumbnail-4.jpg" alt="product image" /></div>
                                        <div><img src="assets/imgs/shop/thumbnail-5.jpg" alt="product image" /></div>
                                        <div><img src="assets/imgs/shop/thumbnail-6.jpg" alt="product image" /></div>
                                        <div><img src="assets/imgs/shop/thumbnail-7.jpg" alt="product image" /></div>
                                        <div><img src="assets/imgs/shop/thumbnail-8.jpg" alt="product image" /></div>
                                        <div><img src="assets/imgs/shop/thumbnail-9.jpg" alt="product image" /></div>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info pr-30 pl-30">
                                    <span class="stock-status out-stock"> Sale Off </span>
                                    <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Seeds of Change Organic Quinoa, Brown</a></h3>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <span class="current-price text-brand">$38</span>
                                            <span>
                                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                                        <span class="old-price font-md ml-15">$52</span>
                                                    </span>
                                        </div>
                                    </div>
                                    <div class="detail-extralink mb-30">
                                        <div class="detail-qty border radius">
                                            <a href="index-2.html#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">1</span>
                                            <a href="index-2.html#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="font-xs">
                                        <ul>
                                            <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                            <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2021</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('Home::Home.section.header') {{-- Include header --}}
        @include('Home::Home.section.mobile-header') {{-- Include mobile-header --}}
            @yield('content') {{-- Yield content --}}
        @include('Home::Home.section.footer') {{-- Include footer --}}
        @include('Home::Home.section.preloader') {{-- Include preloader --}}
        @include('Home::Home.section.js') {{-- Include JS scripts --}}
    </body>
</html>
