@extends('layouts.user')

@section('inner_content')
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="col s12 m9 l6 card-panel">

                    <div class="row">
                        <div class="col s12">
                            <h5>{{ __('Recent Visits') }}</h5>
                        </div>
                    </div>

                    <div class="row margin">
                        <div class="col s12">
                            @if($recent_visits === false)
                                <h5>{{__('No visits!')}}</h5>
                            @else
                                @foreach($recent_visits as $visit)
                                    @component('components.visit_card', ['visit' => $visit])
                                    @endcomponent
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col s12 m7 l4 offset-l1 card-panel">

                    <div class="row">
                        <div class="col s12">
                            <h5>{{ __('Key Indicators') }}</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <table class="vertical-table">
                                <tr>
                                    <th>{{ __('Investigators Baptized and Confirmed') }}</th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Investigators With Baptismal Date') }}</th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Investigators Attended Church') }}</th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th>{{ __('New Investigators') }}</th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Less-Active Attended Church') }}</th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th class="non-bold">{{ __('Visit Performance') }}</th>
                                    <td>0/0 (0%)</td>
                                </tr>
                            </table>
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
        $(document).ready(function () {
            $('.fixed-action-btn').floatingActionButton();
            $('.tooltipped').tooltip({delay: 50});
        });
    </script>
@endsection
