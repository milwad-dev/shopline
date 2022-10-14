@extends('Home::Home.layouts.master')

@section('title', 'Home page')

@section('content')
    @include('Home::Pages.home.sliders', [
         'sliders' => $homeRepo->getLatestSliders(),
         'adv'     => $homeRepo->getOneLatestAdvByLocation(\Modules\Advertising\Enums\AdvertisingLocationEnum::LOCATION_SLIDER->value)->first()
     ]) {{-- Include slider file --}}
    @include('Home::Pages.home.categories') {{-- Include categories file --}}
    @include('Home::Pages.home.discount') {{-- Include discount file --}}
    @include('Home::Pages.home.latest-products', ['products' => $homeRepo->getLatestActiveProducts()]) {{-- Include latest products file --}}
    @include('Home::Pages.home.top-products') {{-- Include top products file --}}
    @include('Home::Pages.home.blog') {{-- Include blog file --}}
    @include('Home::Pages.home.new-letter') {{-- Include new-letter file --}}
@endsection
