@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <a href="{{url()->previous()}}" class="btn btn-primary" style="margin-bottom:20px;">Back</a>

        <div class="card" style="background-image: linear-gradient(to right, white , grey)">
            <div class="card-header" style="background-image: linear-gradient(to right, whitesmoke , grey)">
                    <div class="row justify-content-left">   
                        <div class="col-sm-2">
                            <img src="{{ asset('img/users') }}/{{$user->avatar}}" style="width:150px; height:150px; border-radius:50%;"  alt="Your Profile Image">
                            <p class= " text-center social-media-links">
                                <a href="{{ $user->facebook}}" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="{{ $user->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="{{ $user->youtube}}" target="_blank"><i class="fab fa-youtube-square"></i></a>
                            </p>
                            <a class="btn btn-info" href="{{route('profiles.edit',$user)}}">
                                <i class="fas fa-user"></i> Edit Profile
                            </a>
                        </div>
                        <div class="col-sm-10">
                            <h3>{{ $user->first_name}} {{ $user->last_name}}
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
            </div>
            <div class="row" style="margin-top:15px;">
                <div class="col-sm-2" style="border-right:2.5px solid rgba(0,0,0,.1);">
                    <h3 class="text-center">My Posts</h3>
                </div>
                <div class="col-sm-10">
                    @foreach ($posts as $post)
                    <h3 class="text-center">{{$post->title}}</h3>
                    <hr>
                    <div class="row">
                            
                        <div class="col-sm">
                            <a href="{{route('posts.show',$post->id)}}"><img src="{{ asset('img/posts') }}/{{$post->avatar}}" class="centered rounded" style="margin-left:40px;" alt="No image"></a>
                        </div>
                             
                        <div class="col-sm" style="padding:20px 0 0 20px;">
                            <dl class="">
                                <dt>Posted at:</dt>
                                <dd>{{date('j M, Y H:i',strtotime($post->created_at))}}</dd>
                            </dl>
                            <p>Category: <b><a href="{{route('categories.show',$post->category->id)}}" class="text-secondary">{{$post->category->name}}</a></b></p>
                            @foreach ($post->tags as $tag)
                                <span class="label-default rounded">{{$tag->name}}</span>
                            @endforeach
                        </div>
                    </div>
                        <hr>
                    @endforeach
                </div>    
            </div>
            <hr>  
            <div class="row" style="margin-top:15px;">
                <div class="col-sm-2" style="border-right:2.5px solid rgba(0,0,0,.1);">
                    <h3 class="text-center">Favorites</h3>
                </div>
                <div class="col-sm-10">
                    @foreach ($user->favorites as $post)
                    <h3 class="text-center">{{$post->title}}</h3>
                    <hr>
                    <div class="row">
                            
                        <div class="col-sm">
                            <a href="{{route('posts.show',$post->id)}}"><img src="{{ asset('img/posts') }}/{{$post->avatar}}" class="centered rounded" style="margin-left:40px;" alt="No image"></a>
                        </div>
                             
                        <div class="col-sm" style="padding:20px 0 0 20px;">
                            <div class="author-info">
                                <h6>Author:</h6>
                                <img src="{{ asset('img/users') }}/{{$user->avatar}}" class="author-img"> 
                                <h6 style="">{{$user->first_name}} {{$user->last_name}}</h6> 
                            </div> 
                            <br>
                            <dl class="dl-horizontal">
                                <dt>Posted at:</dt>
                                <dd>{{date('j M, Y H:i',strtotime($post->created_at))}}</dd>
                            </dl>
                            <p>Category: <b><a href="{{route('categories.show',$post->category->id)}}" class="text-secondary">{{$post->category->name}}</a></b></p>
                            @foreach ($post->tags as $tag)
                                <span class="label-default rounded">{{$tag->name}}</span>
                            @endforeach
                        </div>
                    </div>
                        <hr>
                    @endforeach
                </div>    
            </div>   
        </div>
    </div>
</div>

@endsection