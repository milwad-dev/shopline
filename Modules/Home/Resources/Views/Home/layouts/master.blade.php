<!DOCTYPE html>
<html lang="en">
    <head>
        @include('Home::Home.section.meta') {{-- Include meta tag --}}

        <title>@yield('title') - {{ config('app.name') }}</title>

        @include('Home::Home.section.css') {{-- Include css files & favicon --}}
    </head>
    <body>
        @include('Home::Home.section.quick-modal-view') {{-- Include quick modal view --}}
        @include('Home::Home.section.header') {{-- Include header --}}
        @include('Home::Home.section.mobile-header') {{-- Include mobile header for responsive --}}
            @yield('content') {{-- Yield for content --}}
        @include('Home::Home.section.footer') {{-- Include footer --}}
{{--        @include('Home::Home.section.preloader') --}}{{-- Include preloader --}}
        @include('Home::Home.section.js') {{-- Include JS files --}}
    </body>
</html>
