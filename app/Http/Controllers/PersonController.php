<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Support\Facades\Route;

class PersonController extends Controller implements HasWebRoutes
{

    public static function routes()
    {
        Route::get('/people', 'PersonController@getIndex')->name('person.list');
        Route::get('/people/{id}', 'PersonController@get')->name('person.get');
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function getIndex()
    {
        return view('person.index')->with([
            'persons' => Person::orderBy('first_name', 'asc')->get()
        ]);
    }

    public function get($id)
    {
        return view('person.get')->with([
            'person' => Person::find($id)->first()
        ]);
    }
}
