@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div id="login-page" class="row">
                    <div class="col s12 offset-m2 m9 l4 offset-l4 card-panel">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <div class="row">
                                <div class="input-field col s12">
                                    <h5>{{ __('Reset Password') }}</h5>
                                </div>
                            </div>

                            <input type="hidden" name="token" value="{{ $token }}">

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

                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">lock_outline</i>

                                    <input id="password" type="password"
                                           class="validate {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    <label for="password"
                                           class="center-align">{{ __('Password') }}</label>

                                    @if ($errors->has('password'))
                                        <span class="helper-text" data-error="{{ $errors->first('password') }}">
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">lock_outline</i>

                                    <input id="password-confirm" type="password"
                                           class="validate {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password_confirmation" required>

                                    <label for="password-confirm"
                                           class="center-align">{{ __('Confirm Password') }}</label>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 0">
                                <div class="input-field col s3 m3 push-m4">
                                    <button type="submit" class="btn btn-large waves-effect">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
