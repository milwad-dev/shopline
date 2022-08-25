<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2">
            <h3>Popular Products</h3>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach ($products as $product)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="shop-product-right.html">
                                            <img class="default-img" src="{{ $product->first_media->thumb }}"
                                            alt="first media" />
                                            <img class="hover-img" src="{{ $product->second_media->thumb }}"
                                            alt="second media" />
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html">
                                            <i class="fi-rs-heart"></i>
                                        </a>
                                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                    @if ($product->count === 0)
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Unavailable</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">Snack</a>
                                    </div>
                                    <h2>
                                        <a href="{{ $product->path() }}">{{ $product->title }}</a>
                                    </h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> {{ $product->getRate() }}</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">By
                                            <a href="{{ $product->vendor->path() }}">{{ $product->vendor->name }}</a>
                                        </span>
                                    </div>
                                    <div class="product-card-bottom">
{{--                                        <div class="product-price">--}}
{{--                                            <span>$28.85</span>--}}
{{--                                            <span class="old-price">$32.8</span>--}}
{{--                                        </div>--}}
                                        <div class="product-price">
                                            <span>${{ number_format($product->price) }}</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="shop-cart.html">
                                                <i class="fi-rs-shopping-cart mr-5"></i>Add
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
