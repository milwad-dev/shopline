<!DOCTYPE html>
<html lang="en" dir="rtl" class="rtl">
    <head>
        @include('Home::section.meta') {{-- Include meta tag --}}

        <title>@yield('title') - {{ config('app.name') }}</title>

        @include('Home::section.css') {{-- Include css files & favicon --}}
    </head>
    <body>
        @include('Home::section.quick-modal-view') {{-- Include quick modal view --}}
        @include('Home::section.header') {{-- Include header --}}
        @include('Home::section.mobile-header') {{-- Include mobile header for responsive --}}
            @yield('content') {{-- Yield for content --}}
        @include('Home::section.footer') {{-- Include footer --}}
{{--        @include('Home::section.preloader') --}}{{-- Include preloader --}}
        @include('Home::section.js') {{-- Include JS files --}}
    </body>
</html>
