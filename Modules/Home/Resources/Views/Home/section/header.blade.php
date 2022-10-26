<header class="pb-md-4 pb-0">
    <div class="header-top">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-9 col-lg-9 d-lg-block d-none">
                    <div class="header-offer">
                        <div class="notification-slider">
                            <div>
                                <div class="timer-notification">
                                    <h6><strong class="me-1">Welcome to Fastkart!</strong>Wrap new offers/gift
                                        every signle day on Weekends.<strong class="ms-1">New Coupon Code: Fast024
                                        </strong>

                                    </h6>
                                </div>
                            </div>

                            <div>
                                <div class="timer-notification">
                                    <h6>Something you love is now on sale!
                                        <a href="shop-left-sidebar.html" class="text-white">Buy Now
                                            !</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <ul class="about-list right-nav-about">
                        <li class="right-nav-list">
                            <div class="dropdown theme-form-select">
                                <button class="btn dropdown-toggle" type="button" id="select-language"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('home/images/country/united-states.png') }}"
                                         class="img-fluid blur-up lazyload" alt="">
                                    <span>English</span>
                                    <i data-feather="chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="select-language">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)" id="english">
                                            <img src="{{ asset('home/images/country/united-kingdom.png') }}"
                                                 class="img-fluid blur-up lazyload" alt="">
                                            <span>English</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)" id="france">
                                            <img src="{{ asset('home/images/country/germany.png') }}"
                                                 class="img-fluid blur-up lazyload" alt="">
                                            <span>Germany</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)" id="chinese">
                                            <img src="{{ asset('home/images/country/turkish.png') }}"
                                                 class="img-fluid blur-up lazyload" alt="">
                                            <span>Turki</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="top-nav top-header sticky-header">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                            <span class="navbar-toggler-icon">
                                <i class="fa-solid fa-bars"></i>
                            </span>
                        </button>
                        <a href="{{ route('home.index') }}" class="web-logo nav-logo">
                            <img src="{{ asset('home/images/logo/1.png') }}" class="img-fluid blur-up lazyload" alt="">
                        </a>
                        <div class="middle-box">
                            <div class="search-box">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="I'm searching for..."
                                           aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn" type="button" id="button-addon2">
                                        <i data-feather="search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="rightside-box">
                            <div class="search-full">
                                <div class="input-group">
                                            <span class="input-group-text">
                                                <i data-feather="search" class="font-light"></i>
                                            </span>
                                    <input type="text" class="form-control search-type" placeholder="Search here..">
                                    <span class="input-group-text close-search">
                                                <i data-feather="x" class="font-light"></i>
                                            </span>
                                </div>
                            </div>
                            <ul class="right-side-menu">
                                <li class="right-side">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <div class="search-box">
                                                <i data-feather="search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="right-side">
                                    <a href="wishlist.html" class="btn p-0 position-relative header-wishlist">
                                        <i data-feather="heart"></i>
                                    </a>
                                </li>
                                <li class="right-side">
                                    <div class="onhover-dropdown header-badge">
                                        <button type="button" class="btn p-0 position-relative header-wishlist">
                                            <i data-feather="shopping-cart"></i>
                                            <span class="position-absolute top-0 start-100 translate-middle badge">
                                                {{ session()->has('cart') ? count(session()->get('cart')) : 0 }}
                                                <span class="visually-hidden">unread messages</span>
                                            </span>
                                        </button>
                                        <div class="onhover-div">
                                            <ul class="cart-list">
                                                @if (session()->has('cart') && count(session()->get('cart')) > 0)
                                                    @foreach(session()->get('cart') as $product)
                                                        @include('Share::components.home.cart-products', ['product' => $product])
                                                    @endforeach
                                                @else
                                                    <p>Cart is empty.</p>
                                                @endif
                                            </ul>
                                            <div class="price-box">
                                                <h5>Total :</h5>
                                                <h4 class="theme-color fw-bold">
                                                    ${{ number_format(\Modules\Cart\Services\CartService::handleTotalPrice()) }}
                                                </h4>
                                            </div>
                                            <div class="button-group">
                                                <a href="{{ route('carts.home') }}" class="btn btn-sm cart-button">View Cart</a>
                                                <a href="{{ route('cart.delete.all') }}"
                                                   class="btn btn-sm cart-button theme-bg-color text-white">
                                                    Remove all
                                                </a>
                                                <a href="{{ route('checkouts.home') }}" class="btn btn-sm cart-button">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="right-side onhover-dropdown">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                        <div class="delivery-detail">
                                            <h6>Hello,</h6>
                                            <h5>My Account</h5>
                                        </div>
                                    </div>
                                    <div class="onhover-div onhover-div-login">
                                        <ul class="user-box-name">
                                            @auth
                                                <li class="product-box-contain">
                                                    <i></i>
                                                    <a href="log-in.html">Profile</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="sign-up.html">Orders</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="{{ route('logout') }}">Logout</a>
                                                </li>
                                            @else
                                                <li class="product-box-contain">
                                                    <i></i>
                                                    <a href="{{ route('login') }}">Log In</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="{{ route('register') }}">Register</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="{{ route('password.request') }}">Forgot Password</a>
                                                </li>
                                            @endauth
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="header-nav">
                    <div class="header-nav-middle">
                        <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                            <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                <div class="offcanvas-header navbar-shadow">
                                    <h5>Menu</h5>
                                    <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link ps-xl-2 ps-0" href="{{ route('home.index') }}">
                                                Home
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="{{ route('products.home') }}">
                                                Products
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown dropdown-mega">
                                            <a class="nav-link dropdown-toggle ps-xl-2 ps-0" href="javascript:void(0)"
                                               data-bs-toggle="dropdown">Categories
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-2 row g-3">
                                                @foreach ($categories->chunk(7) as $category)
                                                    <div class="dropdown-column col-xl-3">
                                                        @foreach ($category as $cat)
                                                            <a class="dropdown-item" href="{{ $cat->path() }}">
                                                                {{ $cat->title }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="{{ route('blog.home') }}">
                                                Blog
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="{{ route('about-us.home') }}">
                                                About-us
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link nav-link-2" href="{{ route('contacts.create') }}">
                                                Contact
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-nav-right">
                        <a class="btn deal-button" href="">
                            <i data-feather="zap"></i>
                            <span>Deal Today</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
