
@extends('master')

@section('main-content')
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit Catagory</div>
        <div class="card-body">
          <p class="text-center text-success">{{ Session::get('msg')}}</p>
          <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label for="category_name" class="col-md-3">Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="name" id="category_name" value="{{ $category->name }}" placeholder="Category Name...">
              </div>
            </div>

            <div class="row mb-3">
              <label for="description" class="col-md-3">Description</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="description" value="{{ $category->description}}" id="description" placeholder="Description...">
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
                <input type="submit" class="btn btn-sm btn-success" value="Add Category">
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection