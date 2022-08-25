<section class="home-slider style-2 position-relative mb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-12">
                <div class="home-slide-cover">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        @foreach ($sliders as $slider)
                            <div class="single-hero-slider single-animation-wrap"
                            style="background-image: url({{ $slider->media->thumb }})">
                                <div class="slider-content">
                                    <h1 class="display-2 mb-40" style="color: {{ $slider->title_color }}">
                                        {{ $slider->title }}
                                    </h1>
                                    <a class="btn" href="{{ $slider->getLink() }}">Show more</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
            <div class="col-lg-4 d-none d-xl-block">
                <div class="banner-img style-3 animated animated">
                    <div class="banner-text mt-50">
                        <h2 class="mb-50">
                            Delivered <br />
                            to
                            <span class="text-brand"
                            >your<br />
                                            home</span
                            >
                        </h2>
                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
