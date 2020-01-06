@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h4>Edit Your Profile</h4></div>
                <div class="row justify-content-center mt-4">
                        <div class="col-xs-4">
                            <img src="{{ asset(auth()->user()->avatar) }}" style="width:150px; height:150px; border-radius:50%;"  alt="Your Profile Image">
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
                <div class="row justify-content-center">
                    <form method="POST" action="{{ route('profiles.update',Auth::user()) }}" enctype="multipart/form-data">
                            
                            
                           @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" value="{{ Auth::user()->first_name}}" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" value="{{ Auth::user()->last_name}}"class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" value="{{ Auth::user()->username}}" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="text" name="email" value="{{ Auth::user()->email}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" value="{{ Auth::user()->facebook}}"class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" name="instagram" value="{{ Auth::user()->instagram}}"class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="youtube">Youtube</label>
                                <input type="text" name="youtube" value="{{ Auth::user()->youtube}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="about">About you</label>
                                <textarea name="about" id="about" cols="6" rows="6" value="{{ Auth::user()->about}}"class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="Picture">Upload new picture</label>
                                <input type="file" id="avatar" name="avatar" class="form-control">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-user-edit"></i>Edit
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
