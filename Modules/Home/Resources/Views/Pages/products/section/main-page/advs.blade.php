<div class="slider-1 slider-animate product-wrapper no-arrow">
    @foreach ($advs as $adv)
        <div>
            <div class="banner-contain-2 hover-effect">
                <img src="{{ $adv->media->thumb }}" class="bg-img rounded-3 blur-up lazyload" alt="media">
                <div
                    class="banner-detail p-center-right position-relative shop-banner ms-auto banner-small">
                    <div>
                        <a href="{{ $adv->getLink() }}" target="_blank" class="text-white font-large-1">
                            {{ $adv->title }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
