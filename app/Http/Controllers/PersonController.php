<?php

namespace App\Http\Controllers;

use App\Person;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {

    }

    public function list()
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
