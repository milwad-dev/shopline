@extends('Home::Home.layouts.master')

@section('title', 'Home page')

@section('content')
    @include('Home::Home.parts.sliders', [
         'sliders' => $homeRepo->getLatestSliders(),
         'adv' => $homeRepo->getOneLatestAdvByLocation(Modules\Advertising\Enums\AdvertisingLocationEnum::LOCATION_SLIDER->value)->first()
     ])
    @include('Home::Home.parts.categories')
    @include('Home::Home.parts.discount')
    @include('Home::Home.parts.latest-products')
    @include('Home::Home.parts.top-products')
    @include('Home::Home.parts.blog')
    @include('Home::Home.parts.new-letter')
@endsection
