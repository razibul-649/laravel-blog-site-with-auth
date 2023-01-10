@extends('master')

@section('main-content')
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"> login Form</div>
        <div class="card-body">
            <p class="text-center text-success">{{ Session::get('msg')}}</p>
          <form action="{{route('loginInf')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label for="email" class="col-md-3">Email</label>
              <div class="col-md-9">
                <input type="email" class="form-control" name="email" id="email" placeholder="email here.."required>
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
                <input type="submit" class="btn btn-sm btn-success" value="login">
                <a href="{{route('register')}}"  class="btn btn-sm btn-success" >Register</a>
         
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection