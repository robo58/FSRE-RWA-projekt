@extends('layouts.app')

@section('content')

  <div class="row">
      
      <div class="col-md-9">
          <h1 class="text-black">Categories</h1>
          <table class="table table-dark">

              <thead>
                  <tr>
                      <th class="text-white">#</th>
                      <th class="text-white">Name</th>
                      <th>   </th>
                  </tr>
              </thead>
              
              <tbody>
                  @foreach ($categories as $category)
                    <tr>
                        <th class="text-white">{{$category->id}}</th>
                        <td class="text-white">{{$category->name}}</td>
                        <td>
                            <form action="{{route('categories.destroy', $category)}}" method="POST" class="float-left">
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
              <form action="{{route('categories.store')}}" method="post">
                @csrf
                    <h2 class="text-white">New Category</h2>
                    <label for="name" class="text-white">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                    <button type="submit" class="btn btn-primary btn-block">Create New Category</button>
              </form>
          </div>
      </div>
  </div>

@endsection