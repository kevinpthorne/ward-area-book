@extends('layouts.user')

@section('inner_content')
    @if($person != null)
        <div class="row inner-content-margin">
            <div class="col s12 m8 l8 section">

                <div class="row">

                    <div class="col s5 m3 l2">
                        <random-avatar alt="{{ $person->first_name }} {{ $person->last_name }}"></random-avatar>
                    </div>
                    <div class="col s6 m9 l7">
                        <div class="row margin">
                            {{ $person->first_name }} {{ $person->last_name }}
                        </div>
                        <div class="row margin">
                            {{ $person->type }}
                        </div>
                        <div class="row margin pt-2">
                            <i>{{__("Visited since ")}}  {{ Carbon\Carbon::parse($person->created_at)->diffForHumans() }}</i>
                        </div>
                    </div>
                    <div class="col s5 m3 l3 hide-on-med-and-down">

                    </div>
                </div>

                <div class="row">

                    <div class="col s3 m3 l3">
                        <p class="margin">{{

            ($person->datetime_initial_contact == null) ?
            __("Not yet") :
            Carbon\Carbon::parse($person->datetime_initial_contact)->diffForHumans()

            }}</p>
                        <p class="margin"><strong>{{__("Inital Contact")}}</strong></p>
                    </div>
                    <div class="col s3 m3 l3">
                        <p class="margin">{{

            ($person->datetime_scheduled_baptism == null) ?
            __("N/A") :
            Carbon\Carbon::parse($person->datetime_scheduled_baptism)->diffForHumans()

            }}</p>
                        <p class="margin"><strong>{{__("Scheduled Baptism")}}</strong></p>
                    </div>
                    <div class="col s3 m3 l3">
                        <p class="margin">{{

            ($person->datetime_actual_baptism == null) ?
            __("N/A") :
            Carbon\Carbon::parse($person->datetime_actual_baptism)->diffForHumans()

            }}</p>
                        <p class="margin"><strong>{{__("Baptism")}}</strong></p>
                    </div>
                    <div class="col s3 m3 l3">
                        <p class="margin">{{

            ($person->datetime_actual_confirmation == null) ?
            __("N/A") :
            Carbon\Carbon::parse($person->datetime_actual_confirmation)->diffForHumans()

            }}</p>
                        <p class="margin"><strong>{{__("Confirmation")}}</strong></p>
                    </div>
                </div>

                <div class="divider"></div>

                <div class="row margin">
                    <div class="col s12">
                        @if($person->visitsReceived->isEmpty())
                            <h5>{{__('No visits!')}}</h5>
                        @else
                            <h5>{{ __("Visits") }}</h5>
                            @foreach($person->visitsReceived as $visit)
                                @component('components.visit_card', ['visit' => $visit])
                                @endcomponent
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </div>
    @endif
@endsection
