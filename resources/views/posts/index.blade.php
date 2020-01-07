@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="row">
        <div class="col-md-10">
            <h1 class="text-secondary">All Posts</h1>
        </div>
        <div class="col-md-2">
        <a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create new post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-dark">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th> </th>
                </thead>
                
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th>{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{substr($post->body,0,50)}} {{strlen($post->body)>50 ? "..." : ""}} </td>
                            <td>{{date('j M, Y H:i',strtotime($post->created_at))}}</td>
                            <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-info">View</a><a href="{{route('posts.edit',$post->id)}}" class="btn btn-secondary">Edit</a></td>
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