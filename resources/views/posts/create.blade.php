@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            <form method="POST" action="{{route('posts.store')}}">
                @csrf
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control">
                <label for="category">Category:</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <label for="body">Post Body:</label>
                <textarea name="body" id="body" cols="30" rows="10" style="width:637px; height:196px;"></textarea>
                <button type="submit" class="btn btn-succes btn-lg btn-block">Create Post</button>
            </form>
    </div>
</div>   
@endsection