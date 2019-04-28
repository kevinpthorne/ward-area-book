<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HasAPIRoutes;
use Illuminate\Support\Facades\Route;

class PersonController extends Controller implements HasAPIRoutes
{

    public static function apiRoutes()
    {
        Route::get('/people', 'Api\PersonController@index')->name('api.person.list');
    }

    public function index()
    {
        return Person::orderBy('first_name', 'asc')->get()->toJson();
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
}
