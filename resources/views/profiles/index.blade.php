@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <h1 class="text-center text-white" style="margin-bottom:20px;">User List</h1>
        <a href="{{url()->previous()}}" class="btn btn-lg btn-primary" style="margin-bottom:20px;">Back</a>
        <div class="card" style="background-image: linear-gradient(to right, white , grey);">
            <div class="card-header">
                @foreach ($users as $user)
                    
                    <div class="row justify-content-left">   
                        <div class="col-sm-2">
                            <img src="{{ asset('img/users') }}/{{$user->avatar}}" style="width:150px; height:150px; border-radius:50%;"  alt="Your Profile Image">
                            <p class= " text-center social-media-links">
                                <a href="{{ $user->facebook}}" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="{{ $user->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="{{ $user->youtube}}" target="_blank"><i class="fab fa-youtube-square"></i></a>
                            </p>
                            @if (Auth::user()->id===$user->id)
                            <a class="btn btn-info" href="{{route('profiles.edit',$user)}}">
                                <i class="fas fa-user"></i> Edit Profile
                            </a>
                            @endif
                        </div>
                        <div class="col-sm-10">
                            <a href="{{route('profiles.show',$user)}}" class="text-secondary"><h3>{{ $user->first_name}} {{ $user->last_name}}</a>
                                <small class="text-muted">&commat;{{$user->username}}</small>
                            </h3>
                            @foreach($user->roles as $role)
                                @if ($role->name==='author')
                                  <h4 style="color:rgba(0,0,0,.4);">/Author</h4>  
                                @endif
                            @endforeach
                            <hr>
                            <h4><u>About me</u></h4>
                            <p class="font-weight-light text-left">{{$user->about}}</p>
                        </div> 
                    </div>
                    <br><hr><br>
                    @endforeach
            </div>
        </div>
    </div>
</div>


@endsection