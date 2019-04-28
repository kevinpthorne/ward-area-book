<?php

namespace App\Http\Controllers;

use App\Person;
use App\User;
use App\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class VisitController extends Controller
{

    public static function routes()
    {
        Route::get('/visit', 'VisitController@getNewVisitPage')->name('visit.new');
        Route::post('/visit', 'VisitController@postVisit')->name('visit.create');
    }

    public function getNewVisitPage()
    {
        return view('visit.new')->with([
            'persons' => Person::orderBy('first_name', 'asc')->get(),
            'users' => User::all()
        ]);
    }

    protected function validateVisit($data)
    {
        return Validator::make($data, [
            'person_id' => ['required', 'numeric', 'exists:persons,id'],
            'visit_attendees' => ['required'],
            'datetime_visited' => ['required'],
            'met' => ['required', 'boolean'],
        ]);
    }

    public function postVisit(Request $request)
    {
        if ($this->validateVisit($request->all())->fails()) {
            return abort(400);
        }

        $person = Person::find($request->get('person_id'));
        $visitAttendees = array();
        foreach ($request->get('visit_attendees') as $visitAttendeesId) {
            array_push($visitAttendees, User::find($visitAttendeesId));
        }
        $datetimeVisited = $request->get('datetime_visited');
        $visitSummary = $request->get('visit_summary');
        $attendedChurchThisWeek = $request->get('attended_church_this_week');
        $bomReading = $request->get('record_of_bom_reading');
        $met = $request->get('met');

        if ($this->store($person, $visitAttendees, $datetimeVisited, $visitSummary, $met,
            $attendedChurchThisWeek, $bomReading)) {

            return redirect()->route('person.get', [
                'id' => $person->id
                //TODO highlight newly made visit
            ]);

        } else {
            return abort(500);
        }

    }

    public function store($person, $visitAttendees, $datetimeVisited, $visitSummary, $met,
                          $attendedChurchThisWeek = null, $bomReading = null): bool
    {
        $visit = new Visit;

        $visit->datetime_visited = $datetimeVisited;
        $visit->met = $met;
        $visit->visit_summary = $visitSummary;
        $visit->attended_church_this_week = $attendedChurchThisWeek;
        $visit->record_of_bom_reading = $bomReading;

        $visit->person_id = $person->id;

        $visit->save();

        foreach ($visitAttendees as $visitAttendee) {
            if ($visit->attendees->has($visitAttendee->id)) {
                continue;
            }
            $visitAttendee->visitsAttended()->sync($visit);
        }

        $visit->push();

        return true;

    }
}
