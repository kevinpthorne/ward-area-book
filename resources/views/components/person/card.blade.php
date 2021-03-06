<div class="col s12 m12 l12 card-panel" style="padding:5%;">
    <div class="margin">
        <div class="row left-align">
            <div class="col s4 m3 l2">
                <random-avatar href="{{ route('person.get', ['id' => $person->id]) }}"
                        alt="{{ $person->first_name }} {{ $person->last_name }}"></random-avatar>
            </div>
            <div class="col s6 m8 l7">
                <div class="row margin">
                    <h5>{{ $person->first_name }} {{ $person->last_name }}</h5>
                </div>
                <div class="row margin">
                    {{ $person->type }}
                </div>
            </div>
            <div class="col s1 m1 l3 right-align">
                <a class='dropdown-trigger' href='#' data-constrainWidth="false" data-hover="true"
                   data-target='context_dropdown_{{$person->id}}'>
                    <i class="material-icons">more_vert</i>
                </a>

                <ul id="context_dropdown_{{$person->id}}" class="dropdown-content">
                    <li>
                        <a href="https://maps.google.com/?q={{$person->address}}" target="_blank">
                            <i class="small material-icons">person_pin</i>{{ __("Locate") }}</a>
                    </li>
                    <li>
                        <a href="tel:{{ preg_replace('/[^\p{L}\p{N}\s]/u', '', $person->phone) }}">
                            <i class="small material-icons">phone</i> {{ __("Call") }} {{ $person->phone }}</a>
                    </li>
                    <li><a href="sms:{{ preg_replace('/[^\p{L}\p{N}\s]/u', '', $person->phone) }}">
                            <i class="small material-icons">message</i> {{ __("Message") }} {{ $person->phone }} </a>
                    </li>
                    <li><a href="{{route('person.get', ['id' => $person->id])}}">
                            <i class="small material-icons">info_outline</i>{{ __("More Info") }}</a>
                    </li>
                </ul>
            </div>
            {{--<div class="col s5 m3 l3 hide-on-med-and-down">--}}
            {{--<i>{{__("Since")}}  {{ Carbon\Carbon::parse($person->created_at)->diffForHumans() }}</i>--}}
            {{--<p>people here</p>--}}
            {{--</div>--}}
        </div>
    </div>
    <div class="row margin pb-2">
        <div class="col s4 m3 l3">
            <p class="margin">{{

            ($person->datetime_initial_contact == null) ?
            __("Not yet") :
            Carbon\Carbon::parse($person->datetime_initial_contact)->diffForHumans()

            }}</p>
            <p class="margin"><strong>{{__("Inital Contact")}}</strong></p>
        </div>
        <div class="col s4 m3 l3">
            <p class="margin">{{

            ($person->datetime_scheduled_baptism == null) ?
            __("N/A") :
            Carbon\Carbon::parse($person->datetime_scheduled_baptism)->diffForHumans()

            }}</p>
            <p class="margin"><strong>{{__("Scheduled Baptism")}}</strong></p>
        </div>
        <div class="col s4 m3 l3">
            <p class="margin">{{

            ($person->datetime_actual_baptism == null) ?
            __("N/A") :
            Carbon\Carbon::parse($person->datetime_actual_baptism)->diffForHumans()

            }}</p>
            <p class="margin"><strong>{{__("Baptism")}}</strong></p>
        </div>
        <div class="col s3 m3 l3 hide-on-small-only">
            <p class="margin">{{

            ($person->datetime_actual_confirmation == null) ?
            __("N/A") :
            Carbon\Carbon::parse($person->datetime_actual_confirmation)->diffForHumans()

            }}</p>
            <p class="margin"><strong>{{__("Confirmation")}}</strong></p>
        </div>

    </div>
    <div class="row margin col s9 m10 l10">
        {{ $person->background_information }}
    </div>
    <div class="row margin col s12 m12 l12 right-align">
        <i>{{__("Since")}}  {{ Carbon\Carbon::parse($person->created_at)->diffForHumans() }}</i>
        <p>people here</p>
    </div>
    <div class="row margin col s12 m12 l12 right-align">

    </div>
</div>

@section('js')
    <script>
        jQuery(document).ready(function () {
            jQuery('.dropdown-trigger').dropdown({
                constrainWidth: false
            });
        });
    </script>
@endsection

