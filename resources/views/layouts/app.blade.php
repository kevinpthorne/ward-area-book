<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

{{--<link rel="icon" type="image/x-icon"--}}
{{--href="https://www.performanceaudio.com/pub/media/favicon/stores/1/favicon_1.ico">--}}
{{--<link rel="shortcut icon" type="image/x-icon"--}}
{{--href="https://www.performanceaudio.com/pub/media/favicon/stores/1/favicon_1.ico">--}}

<!--Let browser know if website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    @yield('header')
</head>

<body>
<div id="app">

    <header>
        <nav>
            <div class="container nav-wrapper">
                <a class="sidebar-wrapper brand-logo hide-on-small-and-down" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a class="hide-on-med-and-up" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

                @guest
                    <ul class="right hide-on-med-and-down">
                        @component('components.nav-links')
                        @endcomponent
                    </ul>
                @endif
            </div>
        </nav>

        <ul class="sidenav" id="mobile-demo">
            @component('components.nav-links')
            @endcomponent
        </ul>
    </header>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
    jQuery(document).ready(function () {
        jQuery('.sidenav').sidenav();
    });
</script>
@yield('template-js')
@yield('js')
</body>
</html>


