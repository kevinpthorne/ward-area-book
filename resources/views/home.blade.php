@extends('layouts.user')

@section('inner_content')
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="col s12 m9 l6 card-panel">

                    <div class="row">
                        <div class="input-field col s12">
                            <h5>{{ __('Dashboard') }}</h5>
                        </div>
                    </div>

                    <div class="row margin">
                        <div class="input-field col s12">
                            <h5>You're logged in!</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li>
                <a class="btn-floating indigo"><i class="material-icons">group_work</i></a>
                <a href="#" class="btn-floating mobile-fab-tip">Districts</a>
            </li>
            <li>
                <a class="btn-floating red"><i class="material-icons">people</i></a>
                <a href="#" class="btn-floating mobile-fab-tip">Companionships</a>
            </li>
            <li>
                <a class="btn-floating green"><i class="material-icons">person_add</i></a>
                <a href="#" class="btn-floating mobile-fab-tip">New Person</a>
            </li>
            <li>
                <a class="btn-floating yellow darken-3"><i class="material-icons">assignment_turned_in</i></a>
                <a href="#" class="btn-floating mobile-fab-tip">New Visit</a>
            </li>
        </ul>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('.fixed-action-btn').floatingActionButton();
            $('.tooltipped').tooltip({delay: 50});
        });
    </script>
@endsection
