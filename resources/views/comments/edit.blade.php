@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-8 col-md-offset-2"></div>
                    <form action="{{route('comments.update',$comment->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <label for="name" class="text-danger"><h3>Name</h3></label>
                        <input type="text" name="name" id="name" value="{{$comment->name}}" class="form-control" disabled><hr>
                        <label for="email" class="text-danger"><h3>Email</h3></label>
                        <input type="text" name="email" id="email" value="{{$comment->email}}" class="form-control" disabled><hr>
                        <label for="comment" class="text-danger"><h3>Comment</h3></label>
                        <textarea name="comment" id="comment" cols="61" rows="6"  class="form-control">{{$comment->comment}}</textarea>
                        <button type="submit" class="btn btn-block btn-success" style="margin-top:15px;">Update</button>
                        <a href="{{route('posts.show',$post)}}" class="btn btn-info btn-block">Back to post</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection