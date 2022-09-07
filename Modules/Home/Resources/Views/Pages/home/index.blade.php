@extends('Home::Home.layouts.master')

@section('title', 'Home page')

@section('content')
    @include('Home::Home.parts.sliders', [
         'sliders' => $homeRepo->getLatestSliders(),
         'adv' => $homeRepo->getOneLatestAdvByLocation(Modules\Advertising\Enums\AdvertisingLocationEnum::LOCATION_SLIDER->value)->first()
     ]) {{-- Include slider file --}}
    @include('Home::Home.parts.categories') {{-- Include categories file --}}
    @include('Home::Home.parts.discount') {{-- Include discount file --}}
    @include('Home::Home.parts.latest-products', ['products' => $homeRepo->getLatestActiveProducts()]) {{-- Include latest products file --}}
    @include('Home::Home.parts.top-products') {{-- Include top products file --}}
    @include('Home::Home.parts.blog') {{-- Include blog file --}}
    @include('Home::Home.parts.new-letter') {{-- Include new-letter file --}}
@endsection
