@extends('layouts.user')

@section('inner_content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <img src="{{\App\Http\Controllers\UserController::getProfilePhoto($user)}}"
                     style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

                <h2>{{__("You")}}</h2>

                <form enctype="multipart/form-data" action="/profile" method="POST">
                    @csrf

                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">

                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
