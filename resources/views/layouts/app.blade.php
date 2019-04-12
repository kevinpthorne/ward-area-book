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
    <nav>
        <div class="nav-wrapper container">
            <a class="brand-logo" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <!-- Authentication Links -->
                @guest
                    <li>
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
@yield('js')
</body>
</html>


