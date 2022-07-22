<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        {{-- Meta tags --}}
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>@yield('title') - {{ config('app.name') }}</title>

        @include('Panel::section.css') {{-- Include css file --}}
    </head>
    <body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click"
        data-menu="vertical-menu-modern">
        @include('Panel::section.navbar') {{-- Inlucde navbar file --}}
        @include('Panel::section.menu') {{-- Inlucde menu file --}}
            @yield('content') {{-- Yield for content app --}}
        @include('Panel::section.customizer') {{-- Inlucde customizer file --}}
        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>
        @include('Panel::section.footer') {{-- Inlucde footer file --}}
        @include('Panel::section.js') {{-- Inlucde js file --}}
    </body>
</html>
