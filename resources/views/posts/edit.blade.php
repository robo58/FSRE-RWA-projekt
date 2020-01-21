@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
    <div class="row">
        <form method="POST" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            
            <div class="col-md-8">
                <label for="title"><h2 class="text-white">Title:</h2></label>
                <input type="text" name="title" id="title" cols="50" class="form-control" value="{{$post->title}}">
                <label for="category"><h2 class="text-white">Category:</h2></label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <label for="tags"><h2 class="text-white">Tags:</h2></label>
                <select class="form-control select2-multi" name="tags[]" id="tag_id" multiple="multiple">
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
                <label for="body"><h2 class="text-white">Body:</h2></label>
                <textarea name="body" id="mytextarea" cols="50" rows="10" style="width:637px; height:196px;">{{$post->body}}</textarea>
            </div>
            <div class="col-md-4">
                <div class="well bg-grey rounded">
                    <dl class="dl-horizontal">
                        <dt>Created at:</dt>
                        <dd>{{date('j M, Y H:i',strtotime($post->created_at))}}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Last updated at:</dt>
                        <dd>{{date('j M, Y H:i',strtotime($post->updated_at))}}</dd>
                    </dl>
                    <hr>
                    <label for="avatar" class="text-white">Add picture:</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{route('posts.show',$post->id)}}" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success btn-block">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({{ json_encode($post->tags()->allRelatedIds()) }}).trigger('change');
    });
</script>

@endsection