@extends('Home::Home.layouts.master')

@section('title', 'Cart')

@section('content')
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
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
                </div>

                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Cart Total</h3>
                        </div>

                        <div class="summery-contain">
                            <div class="coupon-cart">
                                <h6 class="text-content mb-2">Coupon Apply</h6>
                                <div class="mb-3 coupon-box input-group">
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                           placeholder="Enter Coupon Code Here...">
                                    <button class="btn-apply">Apply</button>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price">$125.65</h4>
                                </li>

                                <li>
                                    <h4>Coupon Discount</h4>
                                    <h4 class="price">(-) 0.00</h4>
                                </li>

                                <li class="align-items-start">
                                    <h4>Shipping</h4>
                                    <h4 class="price text-end">$6.90</h4>
                                </li>
                            </ul>
                        </div>

                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4>Total (USD)</h4>
                                <h4 class="price theme-color">$132.58</h4>
                            </li>
                        </ul>

                        <div class="button-group cart-button">
                            <ul>
                                <li>
                                    <button onclick="location.href = 'checkout.html';"
                                            class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                                </li>

                                <li>
                                    <button onclick="location.href = 'index.html';"
                                            class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
