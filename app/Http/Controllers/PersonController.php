<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

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
            'persons' => Person::orderBy('updated_at', 'desc')->get()
        ]);
    }

    public function get($id)
    {
        return view('person.get')->with([
            'person' => Person::find($id)->first()
        ]);
    }
}
