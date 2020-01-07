@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
  <div class="row">
      
      <div class="col-md-9">
          <h1 class="text-white">Tags</h1>
          <table class="table table-dark">

              <thead>
                  <tr>
                      <th class="text-white">#</th>
                      <th class="text-white">Name</th>
                      <th>   </th>
                  </tr>
              </thead>
              
              <tbody>
                  @foreach ($tags as $tag)
                    <tr>
                        <th class="text-white">{{$tag->id}}</th>
                        <td class="text-white">{{$tag->name}}</td>
                        <td>
                            <form action="{{route('tags.destroy', $tag)}}" method="POST" class="float-left">
                            @csrf
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-warning">Delete</button>
                        </form>
                    </td>
                    </tr> 
                  @endforeach

              </tbody>

          </table>
      </div>
      
      <div class="col-md-3">
          <div class="well">
              <form action="{{route('tags.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <h2 class="text-white">New tag</h2>
                    <label for="name" class="text-white">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                    <button type="submit" class="btn btn-primary btn-block">Create New tag</button>
              </form>
          </div>
      </div>
  </div>
        </div>
    </div>
</div>


@endsection