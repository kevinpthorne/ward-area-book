@extends('layouts.user')

@section('inner_content')
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="col s12 m7 l6 section">

                    <div class="row">
                        <div class="col">
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

                <div class="col s12 m5 l4 offset-l1 card-panel">

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
@endsection
