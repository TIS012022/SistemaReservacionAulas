<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Laravel App</title>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-danger">
        <a class="navbar-brand" href="/" style="padding-left: 5%;">
          <img src="{{asset('images/egenius.png')}}" width="30" height="50"  alt="">
          <a style="padding-right: 70%; font-size: 20px; font-weight: bold;">  EGENIUS </a>
        </a>
       
       
          <ul class="navbar-nav" style="padding-right: 5%">
            @if(auth()->check())
            <li class="nav-item active">
              <p class="text-xl">Bienvenido <p>{{auth()->user()->name}}</p></p>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('login.destroy')}}">Logout</a>
            </li>
            
                
            @else
                
            <li class="nav-item active" >
              <a  class="btn btn-outline-light" href="{{route('login.index')}}">INICIA SESION</a>
            </li>
          <!--  <li class="nav-item">
              <a class="nav-link" href="{{route('register.index')}}">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.registerAdmin')}}">Register Admin</a>
            </li>-->
            @endif
          </ul>
        
      </nav>

    @yield('content')
    
</body>
</html>