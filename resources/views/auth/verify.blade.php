@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div id="login-page" class="row">
                    <div class="col s12 offset-m2 m9 l4 offset-l4 card-panel">

                        <div class="row">
                            <div class="input-field col s12">
                                <h5>{{ __('Verify Your Email Address') }}</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }}, <a
                                        href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @if (session('resent'))
        <script>
            M.toast({
                html: "{{ __('A fresh verification link has been sent to your email address.') }}"
            });
        </script>
    @endif
@endsection
