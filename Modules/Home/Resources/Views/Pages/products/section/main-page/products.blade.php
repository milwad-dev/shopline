<div class="col-xxl-9 col-lg-8">
    <div class="show-button">
        <div class="filter-button-group mt-0">
            <div class="filter-button d-inline-block d-lg-none">
                <a><i class="fa-solid fa-filter"></i> Filter Menu</a>
            </div>
        </div>
        <div class="top-filter-menu">
            <div class="category-dropdown">
                <h5 class="text-content">Sort By :</h5>
                <div class="dropdown">
                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown">
                        <span>Most Popular</span> <i class="fa-solid fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a class="dropdown-item" id="pop" href="javascript:void(0)">Popularity</a>
                        </li>
                        <li>
                            <a class="dropdown-item" id="low" href="javascript:void(0)">Low - High
                                Price</a>
                        </li>
                        <li>
                            <a class="dropdown-item" id="high" href="javascript:void(0)">High - Low
                                Price</a>
                        </li>
                        <li>
                            <a class="dropdown-item" id="rating" href="javascript:void(0)">Average
                                Rating</a>
                        </li>
                        <li>
                            <a class="dropdown-item" id="aToz" href="javascript:void(0)">A - Z Order</a>
                        </li>
                        <li>
                            <a class="dropdown-item" id="zToa" href="javascript:void(0)">Z - A Order</a>
                        </li>
                        <li>
                            <a class="dropdown-item" id="off" href="javascript:void(0)">% Off - Hight To
                                Low</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="grid-option">
                <ul>
                    <li class="three-grid d-xxl-inline-block d-none">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('home/svg/grid-3.svg') }}" class="blur-up lazyload" alt="">
                        </a>
                    </li>
                    <li class="grid-btn active">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('home/svg/grid-4.svg') }}"
                                 class="blur-up lazyload d-lg-inline-block d-none" alt="">
                            <img src="{{ asset('home/svg/grid.svg') }}"
                                 class="blur-up lazyload img-fluid d-lg-none d-inline-block" alt="">
                        </a>
                    </li>
                    <li class="list-btn">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('home/svg/list.svg') }}" class="blur-up lazyload" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
        @foreach ($products as $product)
            <div>
                <div class="product-box-3 h-100 wow fadeInUp">
                    <div class="product-header">
                        <div class="product-image">
                            <a href="{{ $product->path() }}">
                                <img src="{{ $product->first_media->thumb }}"
                                class="img-fluid blur-up lazyload" alt="">
                            </a>
                            <ul class="product-option">
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
                    </div>
                    <div class="product-footer">
                        <div class="product-detail">
                            <span class="span-name">{{ $product->getSku() }}</span>
                            <a href="{{ $product->path() }}">
                                <h5 class="name">{{ $product->title }}</h5>
                            </a>
                            <p class="text-content mt-1 mb-2 product-content">
                                {{ $product->description }}
                            </p>
                            <div class="product-rating">
                                <ul class="rating">
                                    @if ((int) $product->rates_count === 0)
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
                            <h6 class="unit">{{ $product->type }}</h6>
                            <h5 class="price">
                                <span class="theme-color">$ {{ $product->getPrice() }}</span>
{{--                                <del>$15.15</del>--}}
                            </h5>
                            <div class="add-to-cart-box bg-white">
                                <a class="btn btn-add-cart addcart-button" href="{{ $product->cartPath() }}">
                                    Add
                                    <i class="fa-solid fa-plus bg-gray"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <nav class="custome-pagination">
        {{ $products->links() }}
    </nav>
</div>
