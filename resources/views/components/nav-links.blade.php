<!-- Authentication Links -->
@guest
    <li>
        <a href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @if (Route::has('register'))
        <li>
            <a href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
@else
    <li class="card-panel">
        <div class="row margin">
            <div class="col s4 center-align valign-wrapper"><img src="https://materializecss.com/images/yuna.jpg" alt=""
                                                                 class="circle responsive-img"></div>
            <div class="col s8">
                <div class="row margin">
                    <h6><strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong></h6>
                    <p class="margin" style="padding:0;">{{ Auth::user()->position() }}</p>
                </div>
            </div>
        </div>
    </li>

    <li class="{{ Route::currentRouteNamed('home') ? 'active' : '' }}">
        <a href="{{route('home')}}">
            {{__("Dashboard")}}
        </a>
    </li>
    <li class="{{ Route::currentRouteNamed('person.list') ? 'active' : '' }}">
        <a href="{{route('person.list')}}">
            {{__("People")}}
        </a>
    </li>
    <li>
        <a href="#">
            {{__("Companionships")}}
        </a>
    </li>
    <li>
        <a href="#">
            {{__("Leadership")}}
        </a>
    </li>
    <li>
        <a href="#">
            {{__("Visits")}}
        </a>
    </li>

    <li class="divider"></li>

    <li>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
              style="display: none;">
            @csrf
        </form>
    </li>
@endguest
