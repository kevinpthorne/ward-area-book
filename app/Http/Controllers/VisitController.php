<?php

namespace App\Http\Controllers;

use App\Person;
use App\User;
use App\Visit;
use Carbon\Carbon;
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

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function getNewVisitPage()
    {
        return view('visit.new')->with([
//            'persons' => Person::orderBy('first_name', 'asc')->get(),
            'persons' => Person::all(),
            'users' => User::all()
        ]);
    }

    protected function validateVisit($data)
    {
        return Validator::make($data, [
            'person_id' => ['required', 'numeric', 'exists:persons,id'],
            'visit_attendees' => ['present', 'min:1', 'array'],
            'visit_attendees.*' => ['required','exists:users,id'],
            'datetime_visited' => ['required', 'date_format:Y-M-d H:i'],
        ]);
    }

    public function postVisit(Request $request)
    {
        $validation = $this->validateVisit($request->all());
        if ($validation->fails()) {
            //return redirect()->back()->withErrors($validation)->withInput();
            return abort(400, $validation->getMessageBag());
        }

        $person = Person::find($request->get('person_id'));
        $visitAttendees = array();
        foreach ($request->get('visit_attendees') as $visitAttendeesId) {
            array_push($visitAttendees, User::find($visitAttendeesId));
        }
        $datetimeVisited = Carbon::parse($request->get('datetime_visited'));
        $visitSummary = $request->get('visit_summary');
        $attendedChurchThisWeek = $request->get('attended_church_this_week') ? true : false;
        $bomReading = $request->get('record_of_bom_reading');
        $met = $request->get('met') ? true : false;

        if ($this->store($person, $visitAttendees, $datetimeVisited, $visitSummary, $met,
            $attendedChurchThisWeek, $bomReading)) {

            return redirect()->route('person.get', [
                'id' => $person->id
                //TODO highlight newly made visit
            ]);

        } else {
            return abort(500, "Store failed");
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
