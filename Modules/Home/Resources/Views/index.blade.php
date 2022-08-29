@extends('Home::Home.layouts.master')

@section('title', 'Home page')

@section('content')
    <main class="main">
        @include('Home::Home.parts.slider')
        @include('Home::Home.parts.banner')
        @include('Home::Home.parts.popular-products')
        @include('Home::Home.parts.deals-day')
        @include('Home::Home.parts.sellings')
    </main>
@endsection
