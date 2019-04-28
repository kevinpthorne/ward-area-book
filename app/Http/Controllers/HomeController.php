<?php

namespace App\Http\Controllers;

use App\Visit;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller implements HasWebRoutes
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recentVisits = Visit::with('person')->orderBy('datetime_visited', 'desc')->limit(5)->get();
        return view('home')->with([
            'recent_visits' => $recentVisits
        ]);
    }

    public static function routes()
    {
        Route::get('/', 'HomeController@index')->name('home');
    }
}
