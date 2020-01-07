@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
    <div class="row">
        <div class="col-md-8 bg-white rounded text-center">
            <h1>{{$post->title}}</h1>
            <h2>{{ $post->category->name }}</h2>
            <p class="lead">{{$post->body}}</p>
        </div>
        <div class="col-md-4">
            <div class="well bg-white rounded">
                <dl class="dl-horizontal" style="padding:20px 0 0 20px;">
                    <dt>Created at:</dt>
                    <dd>{{date('j M, Y H:i',strtotime($post->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal" style="padding:0 0 0 20px;">
                    <dt>Last updated at:</dt>
                    <dd>{{date('j M, Y H:i',strtotime($post->updated_at))}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6" style="padding:0 0 10px 20px;">
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6" style="padding:0 20px 0 0;">
                    <form method="POST" action="{{route('posts.destroy',$post->id)}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>

@endsection