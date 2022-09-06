<div class="col-xl-3 col-lg-4 d-lg-inline-block d-none ratio_156">
    <div class="home-contain h-100">
        <img src="{{ $adv ? $adv->media->thumb : asset('home/images/veg-2/banner/2.jpg') }}" class="bg-img blur-up lazyload"
        alt="media adv">
        <div class="home-detail p-top-left home-p-sm w-75">
            <div class="section-t-space">
                <h3 class="theme-color">{{ $adv ? $adv->title : config('app.name') }}</h3>
{{--                    <h5 class="text-content">Only this week, Don't miss..</h5> TODO ADD DESC--}}
                <a href="{{ $adv ? $adv->getLink() : 'https://github.com/milwad-dev' }}" class="shop-button">
                    Show more ...
                </a>
            </div>
        </div>
    </div>
</div>

