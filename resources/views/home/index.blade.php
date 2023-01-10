@extends('master')

@section('main-content')
{{--  <br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <h2 class="text-center text-primary">Home Page</h2>
        
      </div>
    </div>
  </div>
</div>  --}}


<div class="row">
   <div class="col-md-10" >
     <div class="row offset-md-2 py-5">
        @foreach ($blogs as $item)
            <div class="card me-3 mt-2" style="width: 20rem;">
              <img src="{{asset('/').$item->image}}" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">{{$item->title}}</p>
                <p class="card-text">{{$item->short_description}}</p>
              </div>
            </div>
       
       @endforeach
      </div>

    </div> 
</div>

@endsection