@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h4>Profile</h4></div>
                <div class="row justify-content-center mt-4">
                        <div class="col-xs-4">
                            <img src="img/users/default.png" class="profile-image rounded-circle p-1" alt="Your Profile Image">
                            <p class= " text-center social-media-links">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-youtube-square"></i></a>
                            </p>
                        </div>
                        <div class="col-xs-12">
                            <h3>{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}
                                <small class="text-muted">&commat;{{Auth::user()->username}}</small>
                            </h3>
                            <hr>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
