@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col s12 m4 l2 hide-on-med-and-down"> <!-- Note that "m4 l3" was added -->
            <!-- Grey navigation panel

                  This content will be:
              3-columns-wide on large screens,
              4-columns-wide on medium screens,
              12-columns-wide on small screens  -->

            <ul id="nav-mobile" class="sidenav sidenav-fixed">

                @component('components.nav-links')
                @endcomponent

            </ul>

        </div>

        <div class="col s10 offset-s1 m8 l10"> <!-- Note that "m8 l9" was added -->
            @yield('inner_content')

        </div>
    </div>

@endsection
