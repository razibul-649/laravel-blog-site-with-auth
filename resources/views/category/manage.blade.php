@extends('master')

@section('main-content')
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">All Category Information</div>
        <div class="card-body">
          <p class="text-center text-success"></p>
          <table class="table table-success table-bordered table-hover">
            <thead>
              <tr>
                <th>Sl No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $cat)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $cat->name }}</td>
                  <td>{{ $cat->description }}</td>
                  <td>
                    <img src="{{ asset('/') . $cat->image }}" alt="" width="200px">
                  </td>
                  <td>
                    <a href="{{route('category.edit',$cat->id)}}" class="btn btn-sm btn-success">Edit</a>
                    <a href="{{route('category.delete',$cat->id)}}" class="btn btn-sm btn-danger">Delete</a>
                  </td>
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