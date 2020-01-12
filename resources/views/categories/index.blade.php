@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
  <div class="row">
      
      <div class="col-md-9">
          <h1 class="text-white">Categories</h1>
          <table class="table table-dark">

              <thead>
                  <tr>
                      <th class="text-white">#</th>
                      <th class="text-white">Name</th>
                      <th></th>
                      <th></th>
                  </tr>
              </thead>
              
              <tbody>
                  @foreach ($categories as $category)
                    <tr>
                        <th class="text-white">{{$category->id}}</th>
                        <td class="text-white">{{$category->name}}</td>
                        <td>
                            <form action="{{route('categories.show',$category)}}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-info">View Posts</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('categories.destroy', $category)}}" method="POST">
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
              <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <h2 class="text-white">New Category</h2>
                    <label for="name" class="text-white">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                    <label for="avatar" class="text-white">Add picture:</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                    <label for="##">       </label>
                    <button type="submit" class="btn btn-primary btn-block">Create New Category</button>
              </form>
          </div>
      </div>
  </div>
        </div>
    </div>
</div>


@endsection