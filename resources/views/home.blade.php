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
@endsection
