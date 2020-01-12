@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
    <div class="row">
        <div class="col-md-9 bg-white rounded">
            <p class="lead">{!!$post->body!!}</p>
            <hr>
            <div class="tags">
                @foreach ($post->tags as $tag)
                    <span class="label-default text-white rounded">{{$tag->name}}</span>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <div class="well bg-white rounded">
                <div class="author-info">
                    <img src="{{ asset('img/users') }}/{{$user->avatar}}" class="author-img">  
                </div> 
                <h6>{{$user->first_name}}</h6><h6>{{$user->last_name}}</h6>
                <dl class="dl-horizontal" style="padding:20px 0 0 20px;">
                    <dt>Posted at:</dt>
                    <dd>{{date('j M, Y H:i',strtotime($post->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal" style="padding:0 0 0 20px;">
                    <dt>Last updated at:</dt>
                    <dd>{{date('j M, Y H:i',strtotime($post->updated_at))}}</dd>
                </dl>
                <hr>
                @can('manage-users')
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
                @endcan
            </div>
            <div class="sidebar">
                <p>this is a sidebar</p>
            </div>
        </div>
    </div>
    <div class="row" style="padding-top:20px">
        <div class="col-md-8 col-md-offset-2 rounded" style="padding-top:20px; background:white;">
            <h3 class="comment-title">
                {{$post->comments()->count()}} Comments
            </h3>
            @foreach ($post->comments as $comment)
            <div class="comment">
                <div class="author-info">
                    <img src="{{ asset('img/users') }}/{{($post->commentAvatar($comment))}}" class="author-img">
                    <div class="author-name">  
                        <h4>{{$comment->name}}</h4>
                        <p class="author-time">{{date('j M, Y H:i',strtotime($comment->created_at))}}</p>
                    </div> 
                    <form action="{{route('comments.destroy',$comment->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-xs btn-danger float-right"><i class="fas fa-trash"></i></button>
                    </form>
                    <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-xs btn-primary float-right"><i class="fas fa-pen"></i></a>
                </div>
                <div class="comment-content">
                {{$comment->comment}}
                <hr>
                </div>
            </div>            
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
