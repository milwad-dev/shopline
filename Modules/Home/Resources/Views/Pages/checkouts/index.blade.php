@extends('Home::Home.layouts.master')

@section('title', 'Checkouts')

@section('content')
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                @include('Home::Pages.checkouts.tablist')
                <div class="col-xxl-9 col-lg-8">
                    <div class="tab-content" id="progressBar">
                        <div class="tab-pane active" id="s-cart" role="tabpanel" aria-labelledby="shopping-cart">
                            <h2 class="tab-title">Shopping Cart</h2>
                            <div class="cart-table p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            @foreach($carts as $product)
                                                <tr class="product-box-contain">
                                                    <td class="product-detail">
                                                        <div class="product border-0">
                                                            <a href="{{ route('products.details', ['sku' => $product['sku'], 'slug' => $product['slug']]) }}"
                                                               class="product-image">
                                                                <img src="{{ $product['first-media'] }}"
                                                                     class="img-fluid blur-up lazyload" alt="product image">
                                                            </a>
                                                            <div class="product-detail">
                                                                <ul>
                                                                    <li class="name">
                                                                        <a href="{{ route('products.details', ['sku' => $product['sku'], 'slug' => $product['slug']]) }}">
                                                                            {{ $product['title'] }}
                                                                        </a>
                                                                    </li>
                                                                    <li class="text-content">
                                                                        <span class="text-title">Sku:</span> {{ $product['sku'] }}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="price">
                                                        <h4 class="table-title text-content">Price</h4>
                                                        <h5>${{ number_format($product['price']) }}
                                                            {{--                                                    <del class="text-content">${{ number_format($product['price']) }}</del> TODO --}}
                                                        </h5>
                                                        {{--                                                <h6 class="theme-color">You Save : $20.68</h6>--}}
                                                    </td>

                                                    <td class="quantity">
                                                        <h4 class="table-title text-content">Quantity</h4>
                                                        {{ $product['quantity'] }}
                                                    </td>

                                                    <td class="subtotal">
                                                        <h4 class="table-title text-content">Total</h4>
                                                        <h5>$
                                                            {{ number_format(\Modules\Cart\Services\CartService::handleTotalOneItemPrice($product['id'])) }}
                                                        </h5>
                                                    </td>

                                                    <td class="save-remove">
                                                        <h4 class="table-title text-content">Action</h4>
                                                        {{--                                                <a class="save notifi-wishlist" href="javascript:void(0)">Save for later</a> TODO--}}
                                                        <a class="remove close_button" href="#"
                                                           onclick="showConfirmMessage('Are you sure to delete?', '{{ route('cart.delete', $product['id']) }}');">
                                                            Remove
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="button-group">
                                <ul class="button-group-list">
                                    <li>
                                        <button onclick="location.href = '{{ route('products.home') }}';"
                                            class="btn btn-light shopping-button text-dark">
                                            <i data-feather="arrow-left"></i>Continue Shopping
                                        </button>
                                    </li>
                                    <li>
{{--                                        TODO CORRECT BUTTON--}}
                                        <button class="btn btn-animation proceed-btn">Continue Delivery Address</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="d-address" role="tabpanel" aria-labelledby="delivery-address">
                            <div class="d-flex align-items-center mb-3">
                                <h2 class="tab-title mb-0">Delivery Address</h2>
                                <button class="btn btn-animation btn-sm fw-bold ms-auto" type="button"
                                    data-bs-toggle="modal" data-bs-target="#add-address">
                                    <i class="fa-solid fa-plus d-block d-sm-none m-0"></i>
                                    <span class="d-none d-sm-block">+ Add New</span>{{-- TODO ADD Route --}}
                                </button>
                            </div>
                            <div class="row g-4">
                                @foreach(auth()->user()->address()->latest()->get() as $address)
                                    <div class="col-xxl-6 col-lg-12 col-md-6">
                                        <div class="delivery-address-box">
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="address"
                                                    id="address" value="{{ $address->address }}"
                                                    @if ($loop->index === 0) checked @endif>
                                                </div>
                                                <ul class="delivery-address-detail">
                                                    <li>
                                                        <h4 class="fw-500">{{ $address->title }}</h4>
                                                    </li>
                                                    <li>
                                                        <p class="text-content">
                                                            <span class="text-title">
                                                                Address:
                                                            </span>{{ $address->address }}
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <h6 class="text-content">
                                                            <span class="text-title">
                                                                Pin Code:
                                                            </span>{{ $address->postcode }}
                                                        </h6>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="button-group">
                                <ul class="button-group-list">
                                    <li>
                                        <button class="btn btn-light shopping-button backward-btn text-dark">
                                            <i class="fa-solid fa-arrow-left-long ms-0"></i>
                                            Return To Shopping Cart
                                        </button> {{-- TODO CORRECT BUTTON --}}
                                    </li>
                                    <li>
                                        <button class="btn btn-animation proceed-btn">Continue Delivery Option</button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-pane" id="d-options" role="tabpanel" aria-labelledby="delivery-option">
                            <h2 class="tab-title">Delivery Option</h2>
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="delivery-option">
                                        <div class="row g-4">
                                            <div class="col-xxl-4 col-sm-6">
                                                <div class="delivery-category">
                                                    <div class="shipment-detail">
                                                        <div class="form-check custom-form-check">
                                                            <input class="form-check-input" type="radio" name="standard"
                                                                   id="standard" checked>
                                                            <label class="form-check-label" for="standard">Standard
                                                                Delivery Option</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-sm-6">
                                                <div class="delivery-items">
                                                    <div>
                                                        <h5 class="items text-content"><span>3 Items</span> @ $693.48
                                                        </h5>
                                                        <h5 class="charge text-content">Delivery Charge $28.12
                                                            <button type="button" class="btn p-0"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Extra Charge">
                                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-md-12">
                                                <div class="select-option">
                                                    <div class="form-floating theme-form-floating">
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option value="0">TOMORROW 10:00 PM - 6:00 PM</option>
                                                            <option value="2">Tuesday 11:00 AM - 6:45 PM</option>
                                                            <option value="3">Wednesday 10:30 AM - 8:00 PM</option>
                                                        </select>
                                                        <label>Select Timing</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="delivery-option">
                                        <div class="row g-4">
                                            <div class="col-xxl-4 col-sm-6">
                                                <div class="delivery-category">
                                                    <div class="shipment-detail">
                                                        <div class="form-check custom-form-check">
                                                            <input class="form-check-input" type="radio" name="standard"
                                                                   id="sameDay">
                                                            <label class="form-check-label" for="sameDay">Same Day
                                                                Delivery Option</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-sm-6">
                                                <div class="delivery-items">
                                                    <div>
                                                        <h5 class="items text-content"><span>3 Items</span> @ $693.48
                                                        </h5>
                                                        <h5 class="charge text-content">Delivery Charge $32.15
                                                            <button type="button" class="btn p-0"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Extra Charge">
                                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-md-12">
                                                <div class="select-option">
                                                    <div class="form-floating theme-form-floating">
                                                        <select class="form-select theme-form-select"
                                                                aria-label="Default select example">
                                                            <option value="0">TOMORROW 10:00 PM - 6:00 PM</option>
                                                            <option value="2">Tuesday 11:00 AM - 6:45 PM</option>
                                                            <option value="3">Wednesday 10:30 AM - 8:00 PM</option>
                                                        </select>
                                                        <label>Select Timing</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="delivery-option">
                                        <div class="row g-4">
                                            <div class="col-xxl-4 col-sm-6">
                                                <div class="delivery-category">
                                                    <div class="shipment-detail">
                                                        <div class="form-check mb-0 custom-form-check">
                                                            <input class="form-check-input" type="radio" name="standard"
                                                                   id="future">
                                                            <label class="form-check-label" for="future">Future Delivery
                                                                Option</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-sm-6">
                                                <div class="delivery-items">
                                                    <div>
                                                        <h5 class="items text-content"><span>3 Items</span> @ $693.48
                                                        </h5>
                                                        <h5 class="charge text-content">Delivery Charge $34.67
                                                            <button type="button" class="btn p-0"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Extra Charge">
                                                                <i class="fa-solid fa-circle-exclamation"></i>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-md-12">
                                                <form class="form-floating theme-form-floating date-box">
                                                    <input type="date" class="form-control">
                                                    <label>Select Date</label>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="button-group">
                                <ul class="button-group-list">
                                    <li>
                                        <button class="btn btn-light shopping-button backward-btn text-dark">
                                            <i class="fa-solid fa-arrow-left-long ms-0"></i>Return To Delivery
                                            Address</button>
                                    </li>

                                    <li>
                                        <button class="btn btn-animation proceed-btn">Continue Payment Option</button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-pane" id="p-options" role="tabpanel" aria-labelledby="payment-option">
                            <h2 class="tab-title">Payment Option</h2>
                            <div class="row g-sm-4 g-2">
                                <div class="col-xxl-4 col-lg-12 col-md-5 order-xxl-2 order-lg-1 order-md-2">
                                    <div class="summery-box">
                                        <div class="summery-header bg-white">
                                            <h3>Order Summery</h3>
                                            <a href="cart.html">Edit Cart</a>
                                        </div>

                                        <ul class="summery-contain bg-white custom-height">
                                            <li>
                                                <h4>Bell pepper <span>X 1</span></h4>
                                                <h4 class="price">$32.34</h4>
                                            </li>

                                            <li>
                                                <h4>Eggplant <span>X 3</span></h4>
                                                <h4 class="price">$12.23</h4>
                                            </li>

                                            <li>
                                                <h4>Onion <span>X 2</span></h4>
                                                <h4 class="price">$18.27</h4>
                                            </li>

                                            <li>
                                                <h4>Potato <span>X 1</span></h4>
                                                <h4 class="price">$26.90</h4>
                                            </li>

                                            <li>
                                                <h4>Baby Chili <span>X 1</span></h4>
                                                <h4 class="price">$19.28</h4>
                                            </li>

                                            <li>
                                                <h4>Broccoli <span>X 2</span></h4>
                                                <h4 class="price">$29.69</h4>
                                            </li>
                                        </ul>

                                        <ul class="summery-total bg-white">
                                            <li>
                                                <h4>Subtotal</h4>
                                                <h4 class="price">$111.81</h4>
                                            </li>

                                            <li>
                                                <h4>Shipping</h4>
                                                <h4 class="price">$8.90</h4>
                                            </li>

                                            <li>
                                                <h4>Tax</h4>
                                                <h4 class="price">$29.498</h4>
                                            </li>

                                            <li>
                                                <h4>Coupon/Code</h4>
                                                <h4 class="price">$-23.10</h4>
                                            </li>

                                            <li class="list-total">
                                                <h4>Total (USD)</h4>
                                                <h4 class="price">$19.28</h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-xxl-8 col-lg-12 col-md-7 order-xxl-1 order-lg-2 order-md-1">
                                    <div class="accordion accordion-flush custom-accordion" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="flush-headingOne">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                     data-bs-target="#flush-collapseOne">
                                                    <div class="custom-form-check form-check mb-0">
                                                        <label class="form-check-label" for="credit"><input
                                                                class="form-check-input mt-0" type="radio"
                                                                name="flexRadioDefault" id="credit" checked> Credit or
                                                            Debit Card</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                                 data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <div class="row g-2">
                                                        <div class="col-12">
                                                            <div class="payment-method">
                                                                <div
                                                                    class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                    <input type="text" class="form-control" id="credit2"
                                                                           placeholder="Enter Credit & Debit Card Number">
                                                                    <label for="credit2">
                                                                        Enter Credit & Debit Card Number</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xxl-4">
                                                            <div class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                <input type="text" class="form-control" id="expiry"
                                                                       placeholder="Enter Expiry Date">
                                                                <label for="expiry">Expiry Date</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-xxl-4">
                                                            <div class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                <input type="text" class="form-control" id="cvv"
                                                                       placeholder="Enter CVV Number">
                                                                <label for="cvv">CVV Number</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-xxl-4">
                                                            <div class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                <input type="password" class="form-control"
                                                                       id="password" placeholder="Enter Password">
                                                                <label for="password">Password</label>
                                                            </div>
                                                        </div>

                                                        <div class="button-group mt-0">
                                                            <ul>
                                                                <li>
                                                                    <button
                                                                        class="btn btn-light shopping-button">Cancel</button>
                                                                </li>

                                                                <li>
                                                                    <button class="btn btn-animation">Use This
                                                                        Card</button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <div class="accordion-header" id="flush-headingTwo">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                     data-bs-target="#flush-collapseTwo">
                                                    <div class="custom-form-check form-check mb-0">
                                                        <label class="form-check-label" for="banking"><input
                                                                class="form-check-input mt-0" type="radio"
                                                                name="flexRadioDefault" id="banking"> Net
                                                            Banking</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                 data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <h5 class="text-uppercase mb-4">Select Your Bank</h5>
                                                    <div class="row g-2">
                                                        <div class="col-md-6">
                                                            <div class="custom-form-check form-check">
                                                                <input class="form-check-input mt-0" type="radio"
                                                                       name="flexRadioDefault" id="bank1">
                                                                <label class="form-check-label" for="bank1">Industrial &
                                                                    Commercial Bank</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="custom-form-check form-check">
                                                                <input class="form-check-input mt-0" type="radio"
                                                                       name="flexRadioDefault" id="bank2">
                                                                <label class="form-check-label" for="bank2">Agricultural
                                                                    Bank</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="custom-form-check form-check">
                                                                <input class="form-check-input mt-0" type="radio"
                                                                       name="flexRadioDefault" id="bank3">
                                                                <label class="form-check-label" for="bank3">Bank of
                                                                    America</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="custom-form-check form-check">
                                                                <input class="form-check-input mt-0" type="radio"
                                                                       name="flexRadioDefault" id="bank4">
                                                                <label class="form-check-label" for="bank4">Construction
                                                                    Bank Corp.</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="custom-form-check form-check">
                                                                <input class="form-check-input mt-0" type="radio"
                                                                       name="flexRadioDefault" id="bank5">
                                                                <label class="form-check-label" for="bank5">HSBC
                                                                    Holdings</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="custom-form-check form-check">
                                                                <input class="form-check-input mt-0" type="radio"
                                                                       name="flexRadioDefault" id="bank6">
                                                                <label class="form-check-label" for="bank6">JPMorgan
                                                                    Chase & Co.</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="select-option">
                                                                <div class="form-floating theme-form-floating">
                                                                    <select class="form-select theme-form-select"
                                                                            aria-label="Default select example">
                                                                        <option value="hsbc">HSBC Holdings</option>
                                                                        <option value="loyds">Lloyds Banking Group
                                                                        </option>
                                                                        <option value="natwest">Nat West Group</option>
                                                                        <option value="Barclays">Barclays</option>
                                                                        <option value="other">Others Bank</option>
                                                                    </select>
                                                                    <label>Select Other Bank</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <div class="accordion-header" id="flush-headingThree">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                     data-bs-target="#flush-collapseThree">
                                                    <div class="custom-form-check form-check mb-0">
                                                        <label class="form-check-label" for="wallet"><input
                                                                class="form-check-input mt-0" type="radio"
                                                                name="flexRadioDefault" id="wallet"> My Wallet</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                 data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <h5 class="text-uppercase mb-4">Select Your Wallet</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="custom-form-check form-check">
                                                                <label class="form-check-label" for="amazon"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                        name="flexRadioDefault" id="amazon"> Amazon
                                                                    Pay</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="custom-form-check form-check">
                                                                <input class="form-check-input mt-0" type="radio"
                                                                       name="flexRadioDefault" id="gpay">
                                                                <label class="form-check-label" for="gpay">Google
                                                                    Pay</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="custom-form-check form-check">
                                                                <input class="form-check-input mt-0" type="radio"
                                                                       name="flexRadioDefault" id="airtel">
                                                                <label class="form-check-label" for="airtel">Airtel
                                                                    Money</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="custom-form-check form-check">
                                                                <input class="form-check-input mt-0" type="radio"
                                                                       name="flexRadioDefault" id="paytm">
                                                                <label class="form-check-label" for="paytm">Paytm
                                                                    Pay</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="custom-form-check form-check">
                                                                <input class="form-check-input mt-0" type="radio"
                                                                       name="flexRadioDefault" id="jio">
                                                                <label class="form-check-label" for="jio">JIO
                                                                    Money</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="custom-form-check form-check">
                                                                <input class="form-check-input mt-0" type="radio"
                                                                       name="flexRadioDefault" id="free">
                                                                <label class="form-check-label"
                                                                       for="free">Freecharge</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <div class="accordion-header" id="flush-headingFour">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                     data-bs-target="#flush-collapseFour">
                                                    <div class="custom-form-check form-check mb-0">
                                                        <label class="form-check-label" for="cash"><input
                                                                class="form-check-input mt-0" type="radio"
                                                                name="flexRadioDefault" id="cash"> Cash On
                                                            Delivery</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="flush-collapseFour" class="accordion-collapse collapse"
                                                 data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <h5 class="cod-review">Pay digitally with SMS Pay Link. Cash may not
                                                        be accepted in COVID restricted areas. <a
                                                            href="javascript:void(0)">Know more.</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="button-group">
                                <ul class="button-group-list">
                                    <li>
                                        <button class="btn btn-light shopping-button backward-btn text-dark">
                                            <i class="fa-solid fa-arrow-left-long ms-0"></i>Return To Delivery
                                            Option</button>
                                    </li>

                                    <li>
                                        <button onclick="location.href = 'order-success.html';"
                                                class="btn btn-animation">Done</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
