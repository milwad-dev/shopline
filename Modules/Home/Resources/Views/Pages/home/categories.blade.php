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
                    @foreach($categories as $category)
                        <div>
                            <a href="{{ $category->path() }}" class="category-box wow fadeInUp">
                                <div>
                                    <img src="{{ $category->media?->original }}" class="blur-up lazyload" alt="{{ $category->title }}">
                                    <h5>{{ $category->title }}</h5>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
