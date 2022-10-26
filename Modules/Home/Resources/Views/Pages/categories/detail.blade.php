@extends('Home::Home.layouts.master')

@section('title', 'Products')

@section('content')
    <section class="section-b-space shop-section">
        <div class="container-fluid-lg">
            <div class="row">
                @include('Home::Pages.products.section.main-page.products', ['products' => $products])
            </div>
        </div>
    </section>
@endsection
