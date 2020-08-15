<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <head>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
</head>
<body  >


  <nav class="navbar navbar-right navbar-expand-lg navbar-light bg-info">
  <img src="{{ asset('public/images/rx.png') }}" height="60px;" width="60px;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}" style="color:white;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('add')}}" style="color:white;">Add Prescription</a>
      </li>
      <li> <a class="nav-link" href="{{route('report')}}" style="color:white;"> Report </a> </li>
      @if(Auth::check())
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style="color:white;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{Auth::user()->username}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </li>
            @endif
        </div>
      </li>

    </ul>

  </div>
</nav>

        @yield('content')


    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('public/bootstrap/jquery.min.js') }}">
  <script type="text/javascript" href="{{asset('public/bootstrap/css/bootstrap.min.js')}}">
</body>
</html>
