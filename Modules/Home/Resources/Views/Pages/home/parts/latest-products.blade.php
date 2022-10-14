<section>
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Latest products</h2>
            <span class="title-leaf">
                <svg class="icon-width">
                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                </svg>
            </span>
            <p>The latest products.</p>
        </div>
        <div class="product-border border-row">
            <div class="slider-6_2 no-arrow">
                @foreach ($products->chunk(2) as $singleProduct)
                    <div>
                        <div class="row m-0">
                            @foreach ($singleProduct as $product)
                                <div class="col-12 px-0">
                                    <div class="product-box wow fadeIn">
                                        <div class="product-image">
                                            <a href="{{ $product->path() }}">
                                                <img src="{{ $product->first_media->thumb }}"
                                                class="img-fluid blur-up lazyload" alt="product image">
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
                                                    <a href="{{ $product->addWishlist() }}" class="notifi-wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-detail">
                                            <a href="{{ $product->path() }}">
                                                <h6 class="name name-2 h-100">{{ $product->title }}</h6>
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
                                            <h6 class="sold weight text-content fw-normal">{{ $product->getSku() }}</h6>
                                            <div class="counter-box">
                                                <h6 class="sold theme-color">$ {{ $product->getPrice() }}</h6>
                                                <div class="addtocart_btn">
                                                    <a class="add-button addcart-button btn buy-button text-light">
                                                        <span>Add</span>
                                                        <i class="fa-solid fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
