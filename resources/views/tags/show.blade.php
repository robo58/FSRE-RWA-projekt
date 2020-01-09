@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-8">
            <h1 class="text-danger">{{$tag->name}} Tag <small>{{$tag->posts()->count()}} Posts</small></h1>
                </div>
                <div class="col-md-4">
                    <a href="{{route('tags.edit',$tag)}}" class="btn btn-primary pull-right btn-block">Edit</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr class="text-danger">
                                <th>#</th>
                                <th>Title</th>
                                <th>Tags</th>
                                <th>    </th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($tag->posts as $post)
                                    <tr class="text-danger">
                                        <th>{{$post->id}}</th>
                                        <td>{{$post->title}}</td>
                                        <td>@foreach ($post->tags as $tag)
                                            <span class="label-default rounded">{{$tag->name}}</span>
                                        @endforeach
                                        </td>
                                        <td><a href="{{route('posts.show',$post)}}" class="btn btn-info btn-sm">View</a></td>
                                    </tr>
                                @endforeach
                        </tbody>    
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection