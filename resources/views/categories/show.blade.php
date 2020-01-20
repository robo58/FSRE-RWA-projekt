@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-danger text-center">{{$category->name}}</h1>
            @can('manage-users')
            <a href="{{route('posts.create')}}" class="btn btn-primary btn-block">Create new Post</a>
            @endcan
            <div class="row">
                @foreach ($posts as $post)   
                <div class="col-md-6 col-lg-4">
                  <a href="{{route('posts.show',$post)}}">
                  <div class="portfolio-item mx-auto rounded">
                    <img class="img-fluid" src="{{ asset('img/posts') }}/{{$post->avatar}}" alt="...">
                    <h3 class="text-center text-danger">{{$post->title}}</h3>
                  </div>
                  </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection