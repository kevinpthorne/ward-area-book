@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div id="login-page" class="row">
                    <div class="col s12 offset-m2 m9 l6 offset-l3 card-panel">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <div class="input-field col s12">
                                    <h5>{{ __('Register') }}</h5>
                                </div>
                            </div>

                            <div class="row margin">
                                <div class="input-field col s12">

                                    <i class="material-icons prefix pt-2">person_outline</i>

                                    <input id="first_name" type="text"
                                           class="validate {{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                           name="first_name"
                                           value="{{ old('first_name') }}" required autofocus>

                                    <label for="first_name"
                                           class="center-align">{{ __('First Name') }}</label>

                                    @if ($errors->has('first_name'))
                                        <span class="helper-text"
                                              data-error="{{ $errors->first('first_name') }}"></span>
                                    @endif
                                </div>
                            </div>

                            <div class="row margin">
                                <div class="input-field col s12">


                                    <input id="last_name" type="text"
                                           class="validate {{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                           name="last_name"
                                           value="{{ old('last_name') }}" required>

                                    <label for="last_name"
                                           class="center-align">{{ __('Last Name') }}</label>

                                    @if ($errors->has('last_name'))
                                        <span class="helper-text" data-error="{{ $errors->first('last_name') }}"></span>
                                    @endif
                                </div>
                            </div>

                            <div class="row margin">
                                <div class="input-field col s12">

                                    <i class="material-icons prefix pt-2">mail_outline</i>

                                    <input id="email" type="email"
                                           class="validate {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email"
                                           value="{{ old('email') }}" required>

                                    <label for="email"
                                           class="center-align">{{ __('E-Mail Address') }}</label>

                                    @if ($errors->has('email'))
                                        <span class="helper-text" data-error="{{ $errors->first('email') }}"></span>
                                    @endif
                                </div>
                            </div>

                            <div class="row margin">
                                <div class="input-field col s12">

                                    <i class="material-icons prefix pt-2">phone_outline</i>

                                    <input id="phone" type="tel" pattern="[0-9]{10}"
                                           title="{{__("Please Enter A Valid Phone Number")}}"
                                           class="validate {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                           name="phone"
                                           value="{{ old('phone') }}">

                                    <label for="phone"
                                           class="center-align">{{ __('Phone Number') }}</label>

                                    @if ($errors->has('phone'))
                                        <span class="helper-text" data-error="{{ $errors->first('phone') }}"></span>
                                    @else
                                        <span class="helper-text">{{__('Optional')}}</span>
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
                                <div class="input-field col s9 m9">
                                    <button type="submit" class="btn btn-large waves-effect">
                                        {{ __('Register') }}
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

@section('js')
    @if( $errors->isNotEmpty() )
        @foreach ($errors->all() as $message)
            <script>
                M.toast({
                    html: "{{ $message }}"
                });
            </script>
        @endforeach
    @endif
@endsection
