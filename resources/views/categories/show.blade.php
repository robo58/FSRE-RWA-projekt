@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-white text-center">{{$category->name}}</h1>
            <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
            @can('manage-users')
            <a href="{{route('posts.create')}}" class="btn btn-info">Create new Post</a>
            @endcan
            <div class="row rounded" style="background-image: linear-gradient(to right, white , grey); margin-top:30px;">
                @foreach ($posts as $post) 
                <div class="col-md-6 col-lg-4" style="margin:5px 0 0 0;">
                  <a href="{{route('posts.show',$post)}}">
                  <div class="portfolio-item mx-auto rounded col-sm">
                    <img class="img-fluid" src="{{ asset('img/posts') }}/{{$post->avatar}}" alt="...">
                    <h3 class="text-center text-secondary">{{$post->title}}</h3>
                  </div>
                </a> 
                <div class="col-sm">
                  <dl class="dl-horizontal">
                    <dt>Posted at:</dt>
                    <dd>{{date('j M, Y H:i',strtotime($post->created_at))}}</dd>
                    <dt>By:</dt>
                    <a href="{{route('profiles.show',$post->user)}}" class="text-secondary"><dd>{{$post->user->first_name}} {{$post->user->last_name}}</dd></a>
                </dl>
                @if (Auth::check())
                <div class="favorite"  style="transform:translate(70%,-150%);">
                    @if (!($post->checkFavorite($post->id)))
                        <form method="POST" action="{{route('favor',$post) }}">
                            @method('PUT')
                            @csrf
                            
                            <button type="submit" class="btn btn-xs btn-info"><i class="far fa-heart"></i></button>
                        </form>
                    @else
                        <form method="POST" action="{{route('unfavor',$post)}}">
                            @method('DELETE')
                            @csrf
                            
                            <button type="submit" class="btn btn-xs btn-info"><i class="fas fa-heart"></i></button>
                        </form>
                    @endif
                </div>
            @endif
              </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection