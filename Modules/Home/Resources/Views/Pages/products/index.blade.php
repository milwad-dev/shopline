@extends('Home::Home.layouts.master')

@section('title', 'Products')

@section('content')
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    @include('Home::Pages.products.section.main-page.advs', ['advs' => $advs])
                </div>
            </div>
        </div>
    </section>
    <section class="section-b-space shop-section">
        <div class="container-fluid-lg">
            <div class="row">
                @include('Home::Pages.products.section.main-page.filter')
                @include('Home::Pages.products.section.main-page.products', ['products' => $products])
            </div>
        </div>
    </section>
@endsection

