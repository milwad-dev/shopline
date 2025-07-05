<footer class="section-t-space">
    <div class="container-fluid-lg">
        <div class="service-section">
            <div class="row g-3">
                <div class="col-12">
                    <div class="service-contain">
                        <div class="service-box">
                            <div class="service-image">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/product.svg" class="blur-up lazyload" alt="">
                            </div>
                            <div class="service-detail">
                                <h5>Every Fresh Products</h5>
                            </div>
                        </div>

                        <div class="service-box">
                            <div class="service-image">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/delivery.svg" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>Free Delivery For Order Over $50</h5>
                            </div>
                        </div>

                        <div class="service-box">
                            <div class="service-image">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/discount.svg" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>Daily Mega Discounts</h5>
                            </div>
                        </div>

                        <div class="service-box">
                            <div class="service-image">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/market.svg" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>Best Price On The Market</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-footer section-b-space section-t-space">
            <div class="row g-md-4 g-3">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-logo">
                        <div class="theme-logo">
                            <a href="{{ route('home.index') }}">
                                <img src="{{ asset(config('app.logo')) }}" class="blur-up lazyload" alt="logo">
                            </a>
                        </div>
                        <div class="footer-logo-contain">
                            <p>
                                {{ config('app.description') }}
                            </p>
                            <ul class="address">
                                <li>
                                    <i data-feather="home"></i>
                                    <a href="javascript:void(0)">{{ config('shareConfig.address') }}</a>
                                </li>
                                <li>
                                    <i data-feather="mail"></i>
                                    <a href="mailto:{{ config('shareConfig.email') }}">
                                        {{ config('shareConfig.email') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Categories</h4>
                    </div>
                    <div class="footer-contain">
                        <ul>
                            @foreach ($categories->slice(0, 6) as $category) {{-- From service provider with view composer --}}
                                <li>
                                    <a href="{{ $category->path() }}" class="text-content">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl col-lg-2 col-sm-3">
                    <div class="footer-title">
                        <h4>Useful Links</h4>
                    </div>
                    <div class="footer-contain">
                        <ul>
                            <li>
                                <a href="{{ route('home.index') }}" class="text-content">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('products.home') }}" class="text-content">Products</a>
                            </li>
                            <li>
                                <a href="{{ route('blog.home') }}" class="text-content">Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('about-us.home') }}" class="text-content">About Us</a>
                            </li>
                            <li>
                                <a href="{{ route('contacts.create') }}" class="text-content">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-3">
                    @auth
                        <div class="footer-title">
                            <h4>Help Center</h4>
                        </div>
                        <div class="footer-contain">
                            <ul>
                                <li>
                                    <a href="order-success.html" class="text-content">Your Order</a>
                                </li>
                                <li>
                                    <a href="user-dashboard.html" class="text-content">Your Account</a>
                                </li>
                                <li>
                                    <a href="wishlist.html" class="text-content">Your Wishlist</a>
                                </li>
                                <li>
                                    <a href="wishlist.html" class="text-content">Privacy & Security</a>
                                </li>
                                <li>
                                    <a href="faq.html" class="text-content">FAQ</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="footer-title">
                            <h4>Account</h4>
                        </div>
                        <div class="footer-contain">
                            <ul>
                                <li>
                                    <a href="{{ route('register') }}" class="text-content">Register</a>
                                </li>
                                <li>
                                    <a href="{{ route('login') }}" class="text-content">Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('password.request') }}" class="text-content">Forgot Password</a>
                                </li>
                                <li>
                                    <a href="wishlist.html" class="text-content">Privacy & Security</a>
                                </li>
                                <li>
                                    <a href="faq.html" class="text-content">FAQ</a>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Contact Us</h4>
                    </div>
                    <div class="footer-contact">
                        <ul>
                            <li>
                                <div class="footer-number">
                                    <i data-feather="phone"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content">Hotline 24/7 :</h6>
                                        <h5>{{ config('shareConfig.phone') }}</h5>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="footer-number">
                                    <i data-feather="mail"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content">Email Address :</h6>
                                        <h5>{{ config('shareConfig.email') }}</h5>
                                    </div>
                                </div>
                            </li>
                            <li class="social-app">
                                <h5 class="mb-2 text-content">Download App :</h5>
                                <ul>
                                    <li class="mb-0">
                                        <a href="{{ route('comming-soon') }}" target="_blank">
                                            <img src="https://themes.pixelstrap.com/fastkart/assets/images/playstore.svg" class="blur-up lazyload"
                                            alt="playstore">
                                        </a>
                                    </li>
                                    <li class="mb-0">
                                        <a href="{{ route('comming-soon') }}" target="_blank">
                                            <img src="https://themes.pixelstrap.com/fastkart/assets/images/appstore.svg" class="blur-up lazyload"
                                            alt="appstore">
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer section-small-space">
            <div class="reserve">
                <h6 class="text-content">©2022 {{ config('app.name') }} All rights reserved</h6>
            </div>
            <div class="payment">
                <img src="{{ asset('home/images/payment/1.png') }}" class="blur-up lazyload" alt="payment logo">
            </div>
            <div class="social-link">
                <h6 class="text-content">Stay connected :</h6>
                <ul>
                    <li>
                        <a href="{{ config('app.facebook') }}" target="_blank">
                            <i data-feather="facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ config('app.twitter') }}" target="_blank">
                            <i data-feather="twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ config('app.instagram') }}" target="_blank">
                            <i data-feather="instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
