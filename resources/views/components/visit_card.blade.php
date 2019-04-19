<div class="col s12 m12 l12 card-panel" style="padding:5%;">
    <div class="margin">
        <div class="row left-align">
            <div class="col s5 m3 l2">
                <random-avatar alt="{{ $visit->person->first_name }} {{ $visit->person->last_name }}"></random-avatar>
            </div>
            <div class="col s6 m9 l7">
                <div class="row margin">
                    {{ $visit->person->first_name }} {{ $visit->person->last_name }}
                </div>
                <div class="row margin">
                    {{ $visit->person->type }}
                </div>
                <div class="row margin pt-2">
                    <i>{{__("Visited since ")}}  {{ Carbon\Carbon::parse($visit->person->created_at)->diffForHumans() }}</i>
                </div>
            </div>
            <div class="col s5 m3 l3 hide-on-med-and-down">
                <i>{{__("Visited")}}  {{ Carbon\Carbon::parse($visit->datetime_visited)->diffForHumans() }}</i>
                <p>people here</p>
            </div>
        </div>
    </div>
    <div class="row col s3 m2 l2">
        <i class="material-icons left-align">check_box{{ ($visit->met) ? '' : '_outline_blank' }}</i>
        <p class="margin">{{__("Met")}}</p>
    </div>
    <div class="row margin col s9 m10 l10">
        {{ $visit->visit_summary }}
    </div>
    <div class="row margin col s12 m12 l12 right-align hide-on-large-only">
        <i>{{__("Visited")}}  {{ Carbon\Carbon::parse($visit->datetime_visited)->diffForHumans() }}</i>
        <p>people here</p>
    </div>
</div>
