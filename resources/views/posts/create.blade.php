@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
                @csrf
                <label for="title"><h2 class="text-secondary">Title:</h2></label>
                <input type="text" name="title" id="title" class="form-control">
                <label for="category"><h2 class="text-secondary">Category:</h2></label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <label for="tags"><h2 class="text-secondary">Tags:</h2></label>
                <select class="form-control select2-multi" name="tags[]" id="tag_id" multiple="multiple">
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
                <label for="body"><h2 class="text-secondary">Body:</h2></label>
                <textarea name="body" id="mytextarea" cols="100" rows="5" ></textarea>
                <label for="avatar" class="text-white">Add picture:</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
                <button type="submit" class="btn btn-success btn-lg btn-block">Create Post</button>
            </form>
    </div>
</div>   
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.select2-multi').select2();
    });
</script>
@endsection
