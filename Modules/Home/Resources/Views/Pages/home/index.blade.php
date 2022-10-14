@extends('Home::Home.layouts.master')

@section('title', 'Home page')

@section('content')
    @include('Home::Pages.home.parts.sliders', [
         'sliders' => $homeRepo->getLatestSliders(),
         'adv'     => $homeRepo->getOneLatestAdvByLocation(\Modules\Advertising\Enums\AdvertisingLocationEnum::LOCATION_SLIDER->value)->first()
     ]) {{-- Include slider file --}}
    @include('Home::Pages.home.parts.categories') {{-- Include categories file --}}
    @include('Home::Pages.home.parts.discount') {{-- Include discount file --}}
    @include('Home::Pages.home.parts.latest-products', ['products' => $homeRepo->getLatestActiveProducts()]) {{-- Include latest products file --}}
    @include('Home::Pages.home.parts.top-products') {{-- Include top products file --}}
    @include('Home::Pages.home.parts.blog') {{-- Include blog file --}}
    @include('Home::Pages.home.parts.new-letter') {{-- Include new-letter file --}}
@endsection
