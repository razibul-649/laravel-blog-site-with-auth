@extends('master')

@section('main-content')
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">All Blog Information</div>
        <div class="card-body">
          <p class="text-center text-success">{{ Session::get('msg')}}</p>
          <table class="table table-success table-bordered table-hover">
            <thead>
              <tr>
                <th>Sl No</th>
                <th>Blog Title</th>
                <th>Category Name</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($blogs as $single_blog)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $single_blog->title }}</td>
                  <td>{{ $single_blog->category->name}}</td>
                  <td>
                    <img src="{{ asset('/') . $single_blog->image }}" alt="" width="200px">
                  </td>
                  <td>
                    {{ $single_blog->status == 1 ? 'Published' : 'Unpublish'}}
                  </td>
                  <td>
                    <a href="{{ route('blog.edit', $single_blog->id) }}" class="btn btn-sm btn-success">Edit</a>
                    <form action="{{ route('blog.destroy', $single_blog->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
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