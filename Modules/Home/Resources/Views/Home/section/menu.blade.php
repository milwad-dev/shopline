<div class="header-bottom header-bottom-bg-color sticky-bar">
    <div class="container">
        <div class="header-wrap header-space-between position-relative">
            <div class="logo logo-width-1 d-block d-lg-none">
                <a href="{{ route('home.index') }}"><img src="{{ asset('home/imgs/theme/logo.svg') }}" alt="logo" /></a>
            </div>
            <div class="header-nav d-none d-lg-flex">
                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                    <nav>
                        <ul>
                            <li class="ml-40">
                                <a class="active" href="{{ route('home.index') }}">Home</a>
                            </li>
                            <li>
                                <a href="page-about.html">About</a>
                            </li>
                            <li>
                                <a href="shop-grid-right.html">Products</a>
                            </li>
                            <li>
                                <a href="index-2.html#">Vendors</a>
                            </li>
                            <li class="position-static">
                                <a href="#">Categories</a>
                                <ul class="mega-menu">
                                    @foreach ($categories->chunk(6) as $category)
                                        @foreach ($category as $cat)
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <ul>
                                                    <li>
                                                        <a href="{{ $cat->path() }}">
                                                            {{ $cat->title }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="blog-category-grid.html">Blog</a>
                            </li>
                            <li>
                                <a href="page-contact.html">Contact</a>
                            </li>
                            @auth
                                <li><a href="page-login.html">My account</a></li>
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endauth
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="hotline d-none d-lg-flex">
                <img src="{{ asset('home/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
                <p>{{ config('shareConfig.phone') }}<span>24/7 Support Center</span></p>
            </div>
            <div class="header-action-icon-2 d-block d-lg-none">
                <div class="burger-icon burger-icon-white">
                    <span class="burger-icon-top"></span>
                    <span class="burger-icon-mid"></span>
                    <span class="burger-icon-bottom"></span>
                </div>
            </div>
            <div class="header-action-right d-block d-lg-none">
                <div class="header-action-2">
                    <div class="header-action-icon-2">
                        <a href="shop-wishlist.html">
                            <img alt="Nest" src="{{ asset('home/imgs/theme/icons/icon-heart.svg') }}" />
                            <span class="pro-count white">4</span>
                        </a>
                    </div>
                    <div class="header-action-icon-2">
                        <a class="mini-cart-icon" href="shop-cart.html">
                            <img alt="Nest" src="{{ asset('home/imgs/theme/icons/icon-cart.svg') }}" />
                            <span class="pro-count white">2</span>
                        </a>
                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                            <ul>
                                <li>
                                    <div class="shopping-cart-img">
                                        <a href="shop-product-right.html"><img alt="Nest" src="{{ asset('home/imgs/shop/thumbnail-3.jpg') }}" /></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                        <h3><span>1 × </span>$800.00</h3>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="index-2.html#"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="shopping-cart-img">
                                        <a href="shop-product-right.html"><img alt="Nest" src="{{ asset('home/imgs/shop/thumbnail-4.jpg') }}" /></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                        <h3><span>1 × </span>$3500.00</h3>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="index-2.html#"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="shopping-cart-footer">
                                <div class="shopping-cart-total">
                                    <h4>Total <span>$383.00</span></h4>
                                </div>
                                <div class="shopping-cart-button">
                                    <a href="shop-cart.html">View cart</a>
                                    <a href="shop-checkout.html">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
