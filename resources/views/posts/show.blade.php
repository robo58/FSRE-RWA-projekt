@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
    <div class="row">
        <div class="col-sm-9 bg-white rounded">
            <p class="lead">{!! $post->body !!}</p>
            <hr>

        </div>
        <div class="col-sm-3">
            <div class="well bg-white rounded">
                @if (Auth::check())
                <div class="favorite justify-content-center">
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
                <div class="author-info">
                    <img src="{{ asset('img/users') }}/{{$user->avatar}}" class="author-img">  
                </div> 
                <h6>{{$user->first_name}} {{$user->last_name}}</h6>
                <dl class="dl-horizontal" style="padding:20px 0 0 20px;">
                    <dt>Posted at:</dt>
                    <dd>{{date('j M, Y H:i',strtotime($post->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal" style="padding:0 0 0 20px;">
                    <dt>Last updated at:</dt>
                    <dd>{{date('j M, Y H:i',strtotime($post->updated_at))}}</dd>
                </dl>
                <hr>
                <div class="tags" style="margin-bottom:10px;">
                    @foreach ($post->tags as $tag)
                        <span class="label-default text-white rounded">{{$tag->name}}</span>
                    @endforeach
                </div>
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


<script>
    new window.Vue({
      el: '#app',
      
      components: {
        'app-world': window.httpVueLoader('/js/components/AppWorld.vue');
        Vue.component('favorite', require('Favorite.vue'));
      },
    })
  </script>

@endsection
