@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header"><h4>Edit Your Profile</h4></div>
                <div class="row justify-content-center mt-4">
                        <div class="col-xs-4">
                            <img src="{{ asset('img/users') }}/{{$user->avatar}}" style="width:150px; height:150px; border-radius:50%;"  alt="Your Profile Image">
                            <p class= " text-center social-media-links">
                                <a href="{{ $user->facebook}}" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="{{ $user->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="{{ $user->youtube}}" target="_blank"><i class="fab fa-youtube-square"></i></a>
                            </p>
                        </div>
                        <div class="col-xs-12">
                            <h3>{{ $user->first_name}} {{ $user->last_name}}
                                <small class="text-muted">&commat;{{$user->username}}</small>
                            </h3>
                            <hr>
                        </div>
                </div>
                <div class="row justify-content-center">
                    <form method="POST" action="{{ route('profiles.update',$user) }}" enctype="multipart/form-data">
                            
                            
                           @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" value="{{ $user->first_name}}" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" value="{{ $user->last_name}}"class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" value="{{ $user->username}}" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="text" name="email" value="{{ $user->email}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" value="{{ $user->facebook}}"class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" name="instagram" value="{{ $user->instagram}}"class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="youtube">Youtube</label>
                                <input type="text" name="youtube" value="{{ $user->youtube}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="about">About you</label>
                                <textarea name="about" id="about" cols="6" rows="6" value="{{ $user->about}}"class="form-control">{{ $user->about}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="Picture">Upload new picture</label>
                                <input type="file" id="avatar" name="avatar" class="form-control">
                            </div>

                            <div class="form-group">
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
