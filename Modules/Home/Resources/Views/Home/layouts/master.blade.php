<!DOCTYPE html>
<html lang="en">
    <head>
        @include('Home::Home.section.meta') {{-- Include meta tags --}}

        <title>@yield('title') - {{ config('app.name') }}</title>

        @include('Home::Home.section.css') {{-- Include css files --}}
    </head>
    <body class="bg-effect">
{{--        @include('Home::Home.section.preloader') --}}{{-- Include loader --}}
        @include('Home::Home.section.header') {{-- Include header --}}
        @include('Home::Home.section.mobile-menu') {{-- Include mobile menu --}}
            @yield('content') {{-- Yield content data --}}
        @include('Home::Home.section.footer') {{-- Include footer --}}
        @include('Home::Home.section.theme-options') {{-- Include theme options --}}
        @include('Home::Home.section.js') {{-- Include js files --}}
    </body>
</html>
