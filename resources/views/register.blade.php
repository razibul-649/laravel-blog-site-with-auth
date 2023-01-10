@extends('master')

@section('main-content')
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"> Registration Form</div>
        <div class="card-body">
            <p class="text-center text-success">{{ Session::get('msg')}}</p>
          <form action="{{route('registerConf')}}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-md-3">Name</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="name" id="name" placeholder="name here.." required>
                </div>
              </div>

            <div class="row mb-3">
              <label for="email" class="col-md-3">Email</label>
              <div class="col-md-9">
                <input type="email" class="form-control" name="email" id="email" placeholder="email here.." required>
              </div>
            </div>

            <div class="row mb-3">
              <label for="password" class="col-md-3">Password</label>
              <div class="col-md-9">
                <input type="password" class="form-control" name="password" id="password" required>
              </div>
            </div>

            
            <div class="row md-3">
              <label for="" class="col-md-3"></label>
              <div class="col-md-9">
                <input type="submit" class="btn btn-sm btn-success" value="Submit">
               
         
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection