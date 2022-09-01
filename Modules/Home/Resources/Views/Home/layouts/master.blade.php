<!DOCTYPE html>
<html lang="en">
    <head>
        @include('Home::Home.section.meta') {{-- Include meta tags --}}

        <title>@yield('title') - {{ config('app.name') }}</title>

        @include('Home::Home.section.css') {{-- Include css files --}}
    </head>
    <body class="bg-effect">
        @include('Home::Home.section.preloader') {{-- Include loader --}}
        @include('Home::Home.section.header') {{-- Include header --}}
        @include('Home::Home.section.mobile-menu') {{-- Include mobile menu --}}
            @yield('content')
        @include('Home::Home.section.footer')
        @include('Home::Home.section.modals')
        @include('Home::Home.section.theme-options')
        @include('Home::Home.section.js')
    </body>
</html>
