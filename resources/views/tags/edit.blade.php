@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <form action="{{route('tags.update',$tag)}}" method="POST">
                @method('PUT')
                @csrf
                    <label for="name">Title:</label>
                    <input type="text" name="name" id="name" value="{{$tag->name}}" class="form-control">
                    <button type="submit" class="btn btn-success">Save</button>
            </form>
            <form action="{{route('tags.destroy', $tag)}}" method="POST" class="float-left">
                @csrf
                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-warning">Delete</button>
            </form>
        </div>
    </div>
</div>


@endsection