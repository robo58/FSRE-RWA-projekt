@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-white text-center">Search Results</h1>
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
            <div class="row mt-5 justify-content-center">
                <form action="{{route('search')}}" method="GET" class="justify-content-center search-form">
                    <input type="text" name="query" id="query" class="text-center form-control form-control-lg search-box" placeholder="{{request()->input('query')}}">
                </form>
             </div>
        </div>
    </div>
</div>
@endsection