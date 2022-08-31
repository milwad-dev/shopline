@if (!is_null($adv))
    <div class="col-lg-4 d-none d-xl-block">
        <div class="banner-img style-3 animated animated"
            style="background: url({{ $adv->media->thumb }}); background-size: cover;">
            <div class="banner-text mt-50">
                <h2 class="mb-50">
                    {{ $adv->title }}
                </h2>
                <a href="{{ $adv->getLink() }}" class="btn btn-xs">More
                    <i class="fi-rs-arrow-small-right"></i>
                </a>
            </div>
        </div>
    </div>
@else
    <div class="col-lg-4 d-none d-xl-block">
        <div class="banner-img style-3 animated animated"
            style="background: url(http://wp.alithemes.com/html/nest/demo/assets/imgs/banner/banner-11.png)">
            <div class="banner-text mt-50">
                <h2 class="mb-50">
                    No content
                </h2>
                <a href="" class="btn btn-xs">More
                    <i class="fi-rs-arrow-small-right"></i>
                </a>
            </div>
        </div>
    </div>
@endif
