<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('/')}}css/my-styles.css">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <a href="{{ route('home')}}" class="navbar-brand">MY BLOG</a>
      <ul class="navbar-nav">
        <li><a href="{{ route('home')}}" class="nav-link">Home</a></li>
        @guest


        @else
          
        <li class="dropdown">
          <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('category.add')}}" class="dropdown-item">Add Category</a></li>
            <li><a href="{{ route('category.manage')}}" class="dropdown-item">Manage Category</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('blog.create')}}" class="dropdown-item">Add Blog</a></li>
            <li><a href="{{ route('blog.index')}}" class="dropdown-item">Manage Blog</a></li>
          </ul>
        </li>
            
        @endguest


        
        @guest

            
          <li><a href="{{ route('login')}}" class="nav-link">Login</a></li>
        
          <li><a href="{{route('register')}}" class="nav-link">Registration</a></li>

          @else
          <li class="dropdown">
            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{Auth::user()->name}}</a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('logOut')}}" class="dropdown-item">Logout</a></li>
            </ul>
          </li>
            
        @endguest
      </ul>
    </div>
  </nav>

  @yield('main-content')


  <script src="{{ asset('/')}}js/my-script.js"></script>
</body>
</html>