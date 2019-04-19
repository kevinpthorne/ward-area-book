@extends('layouts.user')

@section('inner_content')
    @if($person != null)
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="col s12 m8 l8 card-panel">
                        
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
            </div>
        </div>
    @endif
@endsection
