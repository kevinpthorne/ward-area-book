@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col s12 m12 l2 hide-on-med-and-down"> <!-- Note that "m4 l3" was added -->
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

        <div class="sidebar-wrapper">
            <div class="col s12 m12 l12"> <!-- Note that "m8 l9" was added -->
                @yield('inner_content')

                <div class="fixed-action-btn">
                    <a class="btn-floating btn-large">
                        <i class="large material-icons">add</i>
                    </a>
                    <ul>
                        <li>
                            <a class="btn-floating indigo"><i class="material-icons">group_work</i></a>
                            <a href="#" class="btn-floating fab-tip">Districts</a>
                        </li>
                        <li>
                            <a class="btn-floating red"><i class="material-icons">people</i></a>
                            <a href="#" class="btn-floating fab-tip">Companionships</a>
                        </li>
                        <li>
                            <a class="btn-floating green"><i class="material-icons">person_add</i></a>
                            <a href="#" class="btn-floating fab-tip">New Person</a>
                        </li>
                        <li>
                            <a class="btn-floating yellow darken-3"><i class="material-icons">assignment_turned_in</i></a>
                            <a href="#" class="btn-floating fab-tip">New Visit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.fixed-action-btn').floatingActionButton();
            $('.tooltipped').tooltip({delay: 50});
        });
    </script>
@endsection
