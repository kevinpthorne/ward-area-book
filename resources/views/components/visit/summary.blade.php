<div class="col s12 m12 l12 card-panel" style="padding:3%;">
    <div class="row col s3 m2 l2">
        <i class="material-icons left-align">check_box{{ ($visit->met) ? '' : '_outline_blank' }}</i>
        <p class="margin">{{__("Met")}}</p>
    </div>
    <div class="row margin col s9 m10 l10">
        {{ $visit->visit_summary }}
    </div>
    <div class="row margin col s12 m12 l12 right-align">
        <i>{{__("Visited")}}  {{ Carbon\Carbon::parse($visit->datetime_visited)->diffForHumans() }}</i>
        @component('components.attendees', ['visit' => $visit])
        @endcomponent
    </div>
</div>
