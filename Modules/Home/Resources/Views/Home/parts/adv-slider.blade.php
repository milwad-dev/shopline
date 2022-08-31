<div class="col-lg-4 d-none d-xl-block">
    <div class="banner-img style-3 animated animated" style="background: url({{ $adv->media->thumb }})">
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
