@extends('Home::Home.layouts.master')

@section('title', 'Home page')

@section('content')
    @include('Home::Home.parts.sliders')

    <!-- Category Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Browse by Categories</h2>
                <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                <p>Top Categories Of The Week</p>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-9">
                        <div>
                            <a href="shop-left-sidebar.html" class="category-box wow fadeInUp">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/vegetable.svg" class="blur-up lazyload" alt="">
                                    <h5>Vegetables & Fruit</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box wow fadeInUp" data-wow-delay="0.05s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/cup.svg" class="blur-up lazyload" alt="">
                                    <h5>Beverages</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box wow fadeInUp" data-wow-delay="0.1s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/meats.svg" class="blur-up lazyload" alt="">
                                    <h5>Meats & Seafood</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box wow fadeInUp" data-wow-delay="0.15s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/breakfast.svg" class="blur-up lazyload" alt="">
                                    <h5>Breakfast</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box wow fadeInUp" data-wow-delay="0.2s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/frozen.svg" class="blur-up lazyload" alt="">
                                    <h5>Frozen Foods</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box wow fadeInUp" data-wow-delay="0.25s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/milk.svg" class="blur-up lazyload" alt="">
                                    <h5>Milk & Dairies</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box wow fadeInUp" data-wow-delay="0.3s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/pet.svg" class="blur-up lazyload" alt="">
                                    <h5>Pet Food</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box wow fadeInUp" data-wow-delay="0.35s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/biscuit.svg" class="blur-up lazyload" alt="">
                                    <h5>Biscuits & Snacks</h5>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="shop-left-sidebar.html" class="category-box wow fadeInUp" data-wow-delay="0.4s">
                                <div>
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/grocery.svg" class="blur-up lazyload" alt="">
                                    <h5>Grocery & Staples</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Section End -->

    <!-- Discount Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="banner-contain">
                        <div class="banner-contain hover-effect">
                            <img src="../assets/images/vegetable/banner/15.jpg" class="bg-img blur-up lazyload" alt="">
                            <div class="banner-details p-center p-sm-4 p-3 text-white text-center">
                                <div>
                                    <h3 class="lh-base fw-bold text-light">Get $3 Cashback! Min Order of $30</h3>
                                    <h6 class="coupon-code">Use Code : GROCERY1920</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Discount Section End -->

    <!-- Product Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="title">
                <h2>FRUIT & VEGETABLES</h2>
                <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                <p>A virtual assistant collects the products from your list</p>
            </div>
            <div class="product-border border-row">
                <div class="slider-6_2 no-arrow">
                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/1.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Fresh Brown Coconut</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/2.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Fresh Organic Broccoli Crown</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/3.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Fresh Cavendish Banana</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/4.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Fresh Organic Kivi</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/5.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Organic Green Lemon</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/6.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Organic Orange</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/7.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Green lettuce</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/8.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Green Papaya</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/9.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Green Capsicum</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/10.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Organic Fresh Strawberry</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/7.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Green lettuce</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/8.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Green Papaya</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Offer Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="offer-box hover-effect">
                        <img src="../assets/images/veg-2/banner/3.jpg" class="bg-img blur-up lazyload" alt="">
                        <div class="offer-contain p-4">
                            <div class="offer-detail">
                                <h2 class="text-dark">Special Offers <span class="text-danger fw-bold">of the
                                                week!</span></h2>
                                <p class="text-content">Special offer on this discount, Hurry Up!</p>
                            </div>
                            <div class="offer-timing">
                                <div class="time">
                                    <ul>
                                        <li>
                                            <div class="counter text-light">
                                                <div>
                                                    <h3 id="days1"></h3>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter text-light">
                                                <div>
                                                    <h3 id="hours1"></h3>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter text-light">
                                                <div>
                                                    <h3 id="minutes1"></h3>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter text-light">
                                                <div>
                                                    <h3 id="seconds1"></h3>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Offer Section End -->

    <!-- Product Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="title">
                <h2>BREAKFAST & DAIRY</h2>
                <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                <p>A virtual assistant collects the products from your list</p>
            </div>
            <div class="product-border border-row">
                <div class="slider-6_2 no-arrow">
                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/11.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Belgian Waffle</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/12.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Sandwich Cookies</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/13.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Butter Croissant</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/14.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Frooti Mango Drink</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/15.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Bambino Elbow Macaroni Pasta</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/16.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Muffets Burger Bun</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/17.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Tuffets Britannia Cheezza</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/18.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Chicken egg</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/19.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Yogurt</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/20.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Organic Orange Jam</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/17.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Tuffets Britannia Cheezza</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/18.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Chicken egg</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/13.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Butter Croissant</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="product-left.html">
                                            <img src="../assets/images/veg-2/product/14.png"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option justify-content-around">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="product-left.html">
                                            <h6 class="name name-2 h-100">Frooti Mango Drink</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">$ 80.00</h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                               name="quantity" value="1">
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Product Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="slider-4-1 ratio_65 no-arrow product-wrapper">
                        <div>
                            <div class="product-slider wow fadeInUp">
                                <a href="shop-left-sidebar.html" class="product-slider-image">
                                    <img src="../assets/images/veg-2/pro/1.jpg" class="w-100 blur-up lazyload rounded-3"
                                         alt="">
                                </a>

                                <div class="product-slider-detail">
                                    <div>
                                        <a href="shop-left-sidebar.html" class="d-block">
                                            <h3 class="text-title">Hot Deals on New Items</h3>
                                        </a>
                                        <h5>Daily Essentials Eggs & Dairy</h5>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>By <span class="theme-color">Nestfood</span></h6>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                                class="btn btn-animation product-button btn-sm">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-slider wow fadeInUp" data-wow-delay="0.05s">
                                <a href="shop-left-sidebar.html" class="product-slider-image">
                                    <img src="../assets/images/veg-2/pro/2.jpg" class="w-100 blur-up lazyload rounded-3"
                                         alt="">
                                </a>

                                <div class="product-slider-detail">
                                    <div>
                                        <a href="shop-left-sidebar.html" class="d-block">
                                            <h3 class="text-title">Organic Meat Prepared</h3>
                                        </a>
                                        <h5>Delivered to Your Home</h5>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>By <span class="theme-color">Nestfood</span></h6>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                                class="btn btn-animation product-button btn-sm">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-slider wow fadeInUp" data-wow-delay="0.1s">
                                <a href="shop-left-sidebar.html" class="product-slider-image">
                                    <img src="../assets/images/veg-2/pro/3.jpg" class="w-100 blur-up lazyload rounded-3"
                                         alt="">
                                </a>

                                <div class="product-slider-detail">
                                    <div>
                                        <a href="shop-left-sidebar.html" class="d-block">
                                            <h3 class="text-title">Buy More & Save More</h3>
                                        </a>
                                        <h5>Fresh Vegetables & Fruits</h5>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>By <span class="theme-color">Nestfood</span></h6>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                                class="btn btn-animation product-button btn-sm">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-slider wow fadeInUp" data-wow-delay="0.15s">
                                <a href="shop-left-sidebar.html" class="product-slider-image">
                                    <img src="../assets/images/veg-2/pro/4.jpg" class="w-100 blur-up lazyload rounded-3"
                                         alt="">
                                </a>

                                <div class="product-slider-detail">
                                    <div>
                                        <a href="shop-left-sidebar.html" class="d-block">
                                            <h3 class="text-title">Fresh Fruits on Go</h3>
                                        </a>
                                        <h5>Fresh Vegetables & Fruits</h5>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>By <span class="theme-color">Nestfood</span></h6>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                                class="btn btn-animation product-button btn-sm">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Top Selling Section Start -->
    <section class="top-selling-section">
        <div class="container-fluid-lg">
            <div class="slider-4-1">
                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Top Selling</h3>
                                </div>

                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/1.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Tuffets Whole Wheat Bread</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 10.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.05s">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/2.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Potato</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 40.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.1s">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/3.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Green Chilli</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 45.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.15s">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/4.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Muffets Burger Bun</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 70.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Trending Products</h3>
                                </div>

                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/5.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Good Life Refined Sunflower Oil</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 10.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.05s">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/6.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Good Life Raw Peanuts</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 40.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.1s">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/7.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Good Life Raw Peanuts</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 85.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.15s">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/8.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Frooti Mango Drink</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 10.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Recently added</h3>
                                </div>

                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/9.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Tuffets Britannia Cheezza</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 10.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.05s">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/10.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Long Life Toned Milk</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 40.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.1s">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/11.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Organic Tomato</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 45.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.15s">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/12.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Organic Pure Honey</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 90.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Top Rated</h3>
                                </div>

                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/13.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Good Life Walnut Kernels</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 10.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.05s">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/14.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Cherry Red Premium Imported</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 40.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.1s">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/15.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Meatigo Premium Goat Curry</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 45.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.15s">
                                    <a href="product-left.html" class="top-selling-image">
                                        <img src="../assets/images/veg-2/top-selling/16.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left.html">
                                            <h5>Dates Medjoul Premium Imported</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 70.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Selling Section End -->

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
