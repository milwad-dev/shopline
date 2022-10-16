<div class="ratio_156 pt-25">
    <div class="home-contain">
        <a href="{{ $advertising->getLink() }}">
            <img src="{{ $advertising->media->thumb }}" class="bg-img blur-up lazyload" alt="advertising">
            <div class="home-detail p-top-left home-p-medium">
                <div>
{{--                    <h6 class="text-yellow home-banner">Seafood</h6>--}}
                    <h3 class="text-uppercase fw-normal">
                        {{ $advertising->title }}
                    </h3>
{{--                    <h3 class="fw-light">every hour</h3> TODO ADD DESC--}}
                    <button class="btn btn-animation btn-md fw-bold mend-auto">
                        Shop Now<i data-feather="arrow-right"></i>
                    </button>
                </div>
            </div>
        </a>
    </div>
</div>
