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
                            @foreach ($homeRepo->getProductsByViews() as $product)
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="{{ $product->path() }}" class="top-selling-image">
                                        <img src="{{ $product->first_media->thumb }}"
                                        class="img-fluid blur-up lazyload" alt="product photo">
                                    </a>
                                    <div class="top-selling-detail">
                                        <a href="{{ $product->path() }}">
                                            <h5>{{ $product->title }}</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                @if ($product->rates_count === 0)
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                @else
                                                    @for ($i = 0; $i < $product->rates_count; $i++)
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                    @endfor
                                                @endif
                                            </ul>
                                            <span>({{ $product->rates_count }})</span>
                                        </div>
                                        <h6>$ {{ $product->getPrice() }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>Random products</h3>
                            </div>
                            @foreach ($homeRepo->getRandomProducts() as $product)
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="{{ $product->path() }}" class="top-selling-image">
                                        <img src="{{ $product->first_media->thumb }}"
                                        class="img-fluid blur-up lazyload" alt="product image">
                                    </a>
                                    <div class="top-selling-detail">
                                        <a href="{{ $product->path() }}">
                                            <h5>{{ $product->title }}</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                @if ($product->rates_count === 0)
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                @else
                                                    @for ($i = 0; $i < $product->rates_count; $i++)
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                    @endfor
                                                @endif
                                            </ul>
                                            <span>({{ $product->rates_count }})</span>
                                        </div>
                                        <h6>$ {{ $product->getPrice() }}</h6>
                                    </div>
                                </div>
                            @endforeach
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
                            @foreach ($homeRepo->getTopRatedProducts() as $product)
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="{{ $product->path() }}" class="top-selling-image">
                                        <img src="{{ $product->first_media->thumb }}"
                                        class="img-fluid blur-up lazyload" alt="product image">
                                    </a>
                                    <div class="top-selling-detail">
                                        <a href="{{ $product->path() }}">
                                            <h5>{{ $product->title }}</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                @if ($product->rates_count === 0)
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                @else
                                                    @for ($i = 0; $i < $product->rates_count; $i++)
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                    @endfor
                                                @endif
                                            </ul>
                                            <span>({{ $product->rates_count }})</span>
                                        </div>
                                        <h6>$ {{ $product->getPrice() }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
