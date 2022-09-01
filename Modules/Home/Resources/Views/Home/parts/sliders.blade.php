<section class="home-section pt-2">
    <div class="container-fluid-lg">
        <div class="row g-4">
            <div class="col-xl-9 col-lg-8">
                <div class="home-contain h-100">
                    <img src="{{ asset('home/images/veg-2/banner/1.jpg') }}" class="bg-img blur-up lazyload" alt="">
                    <div class="home-detail p-center-left w-75 position-relative mend-auto">
                        <div>
                            <h6>Exclusive offer <span>30% Off</span></h6>
                            <h1 class="w-75 text-uppercase poster-1">Stay home & delivered your <span
                                    class="daily">Daily Needs</span></h1>
                            <p class="w-58 d-none d-sm-block">Many organizations have issued official
                                statements encouraging people to reduce their intake of sugary drinks.</p>
                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                    class="btn btn-animation mt-xxl-4 mt-2 home-button mend-auto">Shop Now <i
                                    class="fa-solid fa-right-long ms-2 icon"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            @include('Home::Home.parts.adv-sliders', ['adv' => $adv])
        </div>
    </div>
</section>
