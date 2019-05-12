<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public static function routes()
    {
        Route::get('/u', 'UserController@getIndex')->name('user.list');
        Route::get('/u/{id}', 'UserController@get')->name('user.get');
        Route::post('/u/{id}/updatePhoto', 'UserController@updateProfilePhoto')->name('user.updatePhoto');


        Route::get('/me', 'UserController@getMe')->name('user.me');
        Route::post('/me/updatePhoto', 'UserController@updateMyProfilePhoto')->name('user.me.updatephoto');
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function getIndex()
    {
        return view('user.index')->with([
            'persons' => User::orderBy('first_name', 'asc')->get()
        ]);
    }

    public function get($id)
    {
        return view('user.profile')->with([
            'user' => User::find($id)->first()
        ]);
    }

    public function getMe()
    {
        return view('user.profile')->with([
            'user' => Auth::user()
        ]);
    }

    public static function getProfilePhoto(\App\User $user)
    {
        if (strpos($user->img_url, '//') !== false) {
            return $user->img_url;
        } else {
            return env('APP_URL') . '/storage/avatars/' . $user->img_url;
        }
    }

    public function updateProfilePhoto($id, Request $request)
    {
        if ($request->hasFile('avatar')) {
            $validation = Validator::make($request->all(), [
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation);
            }

            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300, 300)->save(public_path('/avatars/' . $filename));

            $user = User::find($id);
            $user->img_url = $filename;
            $user->save();
        }
        return redirect()->back();
    }

    public function updateMyProfilePhoto(Request $request)
    {
        return $this->updateProfilePhoto($request->user()->id, $request);
    }
}
