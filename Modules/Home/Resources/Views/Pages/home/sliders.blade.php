<section class="home-section pt-2">
    <div class="container-fluid-lg">
        <div class="row g-4">
            @foreach ($sliders as $slider)
                <div class="col-xl-9 col-lg-8">
                    <div class="home-contain h-100">
                        <img src="{{ $slider->media->thumb }}" class="bg-img blur-up lazyload" alt="photo-slider">
                        <div class="home-detail p-center-left w-75 position-relative mend-auto">
                            <div>
                                <h1 class="w-75 text-uppercase poster-1" style="color: {{ $slider->title_color }}">
                                    {{ $slider->title }}
                                </h1>
{{--                                <p class="w-58 d-none d-sm-block">Many organizations have issued official TODO ADD DESC--}}
{{--                                    statements encouraging people to reduce their intake of sugary drinks.</p>--}}
                                <button class="btn btn-animation mt-xxl-4 mt-2 home-button mend-auto">
                                    Show more <i data-feather="chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @include('Home::Pages.home.adv-sliders', ['adv' => $adv])
        </div>
    </div>
</section>
