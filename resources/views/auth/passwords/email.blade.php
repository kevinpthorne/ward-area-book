@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div id="login-page" class="row">
                    <div class="col s12 offset-m2 m9 l4 offset-l4 card-panel">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row">
                                <div class="input-field col s12">
                                    <h5>{{ __('Reset Password') }}</h5>
                                </div>
                            </div>

                            @if (session('status'))
                                <div class="row">
                                    <div class="input-field col s12">
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row margin">
                                <div class="input-field col s12">

                                    <i class="material-icons prefix pt-2">person_outline</i>

                                    <input id="email" type="email"
                                           class="validate {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email"
                                           value="{{ old('email') }}" required autofocus>

                                    <label for="email"
                                           class="center-align">{{ __('E-Mail Address') }}</label>

                                    @if ($errors->has('email'))
                                        <span class="helper-text" data-error="{{ $errors->first('email') }}"></span>
                                    @endif
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 0">
                                <div class="input-field col s10 offset-s2 m9 offset-m3 l9 offset-l2">
                                    <button type="submit" class="btn waves-effect">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
