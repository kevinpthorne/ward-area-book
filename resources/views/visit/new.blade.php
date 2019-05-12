@extends('layouts.user')

@section('inner_content')

    <div class="row">
        <div class="col s12 m10 l8 section">

            <div class="row">
                <div class="col">
                    <h5>{{ __('New Visit') }}</h5>
                </div>
            </div>

            <div class="row">
                <form class="col s12" id="new_visit_form" method="POST" action="{{ route('visit.create') }}">
                    @csrf

                    <div class="row">
                        <div class="input-field col s12">
                            @if($persons)
                                <select name="person_id" required>
                                    <optgroup label="{{__("Assigned")}}">
                                    </optgroup>
                                    <optgroup label="{{__("All")}}">
                                        @foreach($persons as $person)
                                            <option value="{{$person->id}}">{{$person->first_name}} {{$person->last_name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                <label>{{__("Person visited")}}</label>
                            @else
                                <p>{{__("No people found")}}</p>
                            @endif
                        </div>
                    </div>

                    <div id="visit_attendees[]" class="chips chips-placeholder chips-autocomplete">
                    </div>

                    <div class="row">
                        <div class="input-field col s6 m6 l6">
                            <input type="text" id="datepicker" class="datepicker">
                            <label for="datepicker">{{__("Date Visited")}}</label>
                            <a class="btn"
                               onclick="M.Datepicker.getInstance(document.getElementById('datepicker')).open();">
                                <i class="material-icons">date_range</i>
                            </a>
                        </div>
                        <div class="input-field col s6 m6 l6">

                            <input type="text" id="timepicker" class="timepicker">
                            <label>{{__("Time Visited")}}</label>
                            <a class="btn"
                               onclick="M.Timepicker.getInstance(document.getElementById('timepicker')).open();">
                                <i class="material-icons">timelapse</i>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m12 l3">

                            <label>
                                <input type="checkbox" name="met" value="true">
                                <span>{{__("Seen?")}}</span>
                            </label>

                        </div>

                        <div class="input-field col s12 m12 l6">
                            <label>
                                <input type="checkbox" name="attended_church_this_week" value="true">
                                <span>{{__("Attended Church this Week?")}}</span>
                            </label>
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="input-field col s12">
                            <p>{{__("Describe how they understood or received what was taught, accepted commitments, and so on.")}}</p>
                        </div>
                        <div class="input-field col s12">

                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="visit_summary" name="visit_summary" class="materialize-textarea limited"
                                      data-length="65535" required></textarea>
                            <label for="visit_summary">
                                {{__("Visit Summary")}}
                            </label>
                            <span class="helper-text">{{__("Describe how they understood or received what was taught, accepted commitments, and so on.")}}</span>
                        </div>

                    </div>

                    <div class="row">

                        <div class="input-field col s12 m8 l8">
                            <i class="material-icons prefix">book</i>
                            <input id="bom_reading" name="bom_reading" type="text" data-length="20" class="limited"/>
                            <label for="bom_reading">{{__("Record of Scripture Reading")}}</label>
                            <span class="helper-text">({{__("Optional")}})</span>
                        </div>

                    </div>

                    <div class="row">

                        <div class="input-field col s5 m5 l5">
                            <button id="submit" type="submit" class="btn btn-large waves-effect">
                                {{ __('Submit') }}
                            </button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>


@endsection

@section('js')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                maxDate: new Date(),
                onSelect: function (date) {
                    if (document.getElementById('datepicker').classList.contains("invalid")) {
                        document.getElementById('datepicker').classList.remove("invalid");
                        document.getElementById('datepicker').classList.add("valid");
                    }
                },
            });

            elems = document.querySelectorAll('.timepicker');
            instances = M.Timepicker.init(elems, {
                twelveHour: true,
                onSelect: function (date) {
                    if (document.getElementById('timepicker').classList.contains("invalid")) {
                        document.getElementById('timepicker').classList.remove("invalid");
                        document.getElementById('timepicker').classList.add("valid");
                    }
                },
            });
        });

        jQuery(document).ready(function () {
            $('select').formSelect();

            $('.limited').characterCounter();

            $('.chips').chips();
            $('.chips-placeholder').chips({
                placeholder: '+ {{__("Missionary")}}',
            });
            $('.chips-autocomplete').chips({
                data: [{
                    tag: '{{request()->user()->first_name}} {{request()->user()->last_name}}',
                    image: '{{\App\Http\Controllers\UserController::getProfilePhoto(request()->user())}}',
                    id: '{{request()->user()->id}}'
                }],
                autocompleteOptions: {
                    data: {
                        @foreach($users as $user)
                        '{{$user->first_name}} {{$user->last_name}}':
                            {
                                tag: '{{$user->first_name}} {{$user->last_name}}',
                                image: '{{\App\Http\Controllers\UserController::getProfilePhoto($user)}}',
                                id: '{{$user->id}}'
                            },
                        @endforeach
                    },
                    limit: Infinity,
                    minLength: 1,
                }
            });

            function getDateTime(dateValue, timeValue, amOrPm) {
                var data = String(dateValue).split(' ');
                var month = data[1];
                var day = data[2];
                var year = data[3];

                var timeData = timeValue.split(":");
                var hour = parseInt(timeData[0]);
                var minute = timeData[1];

                if (amOrPm == "PM" && hour <= 11) {
                    hour += 12;
                } else if (amOrPm == "AM" && hour == 12) {
                    hour = 0;
                }

                return year + '-' + month + '-' + day + ' ' + hour + ':' + minute;
            }

            function addVisitAttendees(chipsData, form) {
                for (let i = 0; i < chipsData.length; ++i) {
                    let visit_attendees = document.createElement("input");
                    visit_attendees.type = "text";
                    visit_attendees.name = "visit_attendees[]";
                    visit_attendees.value = chipsData[i].id;
                    form.appendChild(visit_attendees);
                }
            }

            $('#new_visit_form').submit(function (e) {

                //validate time and date pickers
                if (typeof M.Datepicker.getInstance(document.getElementById('datepicker')).date == 'undefined') {
                    document.getElementById('datepicker').classList.add("invalid");
                    return false;
                }
                if (typeof M.Timepicker.getInstance(document.getElementById('timepicker')).time == 'undefined') {
                    document.getElementById('timepicker').classList.add("invalid");
                    return false;
                }

                //add time and date to form as one input
                let datetime_visited = document.createElement("input");
                datetime_visited.type = "text";
                datetime_visited.name = "datetime_visited";
                datetime_visited.value = getDateTime(
                    M.Datepicker.getInstance(document.getElementById('datepicker')).date,
                    M.Timepicker.getInstance(document.getElementById('timepicker')).time,
                    M.Timepicker.getInstance(document.getElementById('timepicker')).amOrPm
                );
                document.getElementById("new_visit_form").appendChild(datetime_visited);

                //package chips and add to form
                addVisitAttendees(M.Chips.getInstance(document.getElementById("visit_attendees[]")).chipsData,
                    document.getElementById("new_visit_form"));

                //let it submit
            });
        });
    </script>
@endsection
