@extends('master')

@section('main-content')
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit Blog Form</div>
        <div class="card-body">
          <p class="text-center text-success">{{ Session::get('msg')}}</p>
          <form action="{{ route('blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <label for="category_id" class="col-md-3">Category Name</label>
              <div class="col-md-9">
                <select class="form-control" name="category_id" id="category_id">
                  <option value="">Select One...</option>
                  @foreach($categories as $cat)
                    <option value="{{$cat->id}}" {{ $cat->id == $blog->category_id ? 'selected' : '' }}>{{$cat->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="title" class="col-md-3">Blog Title</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="title" id="title" value="{{ $blog->title }}" placeholder="Title...">
              </div>
            </div>

            <div class="row mb-3">
              <label for="short_description" class="col-md-3">Short Description</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="short_description" id="short_description" value="{{ $blog->short_description }}" placeholder="Short Description...">
              </div>
            </div>

            <div class="row mb-3">
              <label for="long_description" class="col-md-3">Long Description</label>
              <div class="col-md-9">
                <textarea class="form-control" name="long_description" id="long_description" placeholder="Long Description..." cols="30" rows="5">{{ $blog->long_description }}</textarea>
              </div>
            </div>

            <div class="row mb-3">
              <label for="image" class="col-md-3">Image</label>
              <div class="col-md-9">
                <input type="file" class="form-control" name="image" id="image">
              </div>
            </div>
            <div class="row md-3">
              <label for="" class="col-md-3"></label>
              <div class="col-md-9">
                <input type="reset" class="btn btn-sm btn-danger" value="Reset">
                <input type="submit" class="btn btn-sm btn-success" value="Update Blog">
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection