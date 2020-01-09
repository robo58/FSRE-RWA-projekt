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
            <hr>
            <div class="tags">
                @foreach ($post->tags as $tag)
                    <span class="label-default text-white rounded">{{$tag->name}}</span>
                @endforeach
            </div>
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
    <div class="row" style="padding-top:20px">
        <div class="col-md-8 col-md-offset-2 rounded" style="padding-top:20px; background:white;">
            @foreach ($post->comments as $comment)
                <h6>Name: {{$comment->name}}</h6>
                <p><h6>Comment:</h6> <br>{{$comment->comment}}</p>
                <hr>            
            @endforeach
        </div>
    </div>
    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="padding-top:50px;">
            <form action="{{route('comments.store',$post->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="name"><h4 class="text-danger">Name:</h4></label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="email"><h4 class="text-danger">Email:</h4></label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="comment"><h4 class="text-danger">Comment:</h4></label>
                        <textarea name="comment" id="comment" cols="30" rows="5" class="form-control"></textarea>
                        <button type="submit" class="btn btn-success btn-block">Add Comment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        </div>
    </div>
</div>


@endsection
