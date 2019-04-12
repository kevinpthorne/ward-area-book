@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div id="login-page" class="row">
                    <div class="col s12 offset-m2 m9 l4 offset-l4 card-panel">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row">
                                <div class="input-field col s12">
                                    <h5>{{ __('Login') }}</h5>
                                </div>
                            </div>


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
                                    <label for="password"
                                           class="center-align">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                           class="validate {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="helper-text" data-error="{{ $errors->first('password') }}">
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row center-align">
                                <div class="input-field col s12 m12">
                                    <div class="form-check">
                                        <input class="filled-in" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <span>
                                            {{ __('Remember Me') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 0">
                                <div class="input-field col s3 m3 push-m4">
                                    <button type="submit" class="btn btn-large waves-effect">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>

                            <div class="row no-padding margin">
                                <div class="input-field col s12 m12 push-m6">
                                    @if (Route::has('password.request'))
                                        <a class="waves-effect btn-flat" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
