@extends('layouts.user')

@section('inner_content')
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="col s12 m7 l6 card-panel">

                    <div class="row">
                        <div class="col">
                            <h5>{{ __('People') }}</h5>
                        </div>
                    </div>

                    <div class="row margin">
                        <div class="col s12">
                            @if($persons === false)
                                <h5>{{__('No people!')}}</h5>
                            @else
                                @foreach($persons as $person)
                                    @component('components.person.person_card', ['person' => $person])
                                    @endcomponent
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
