<div class="col s12 m12 l12 card-panel" style="padding:5%;">
    <div class="container row">
        <div class="col s3 m3 l3">
            <random-avatar></random-avatar>
        </div>
        <div class="col s9 m9 l9">
            <div class="row margin">
                {{ $visit->person->first_name }} {{ $visit->person->last_name }}

                <i class="material-icons">check_box{{ ($visit->met) ? '' : '_outline_blank' }}</i>
            </div>
            <div class="row margin">
                {{ $visit->person->type }}
            </div>

        </div>
    </div>
    <div class="row margin">
        {{ $visit->visit_summary }}
    </div>
</div>
