<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$hotelname}} - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="{{ asset('css/goldfish.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body>
  <div class="page-wrap">
    <div class="header">
      <div class="navbar">
        <ul class="navbar-nav mr-auto">
        <span>0 Online Now</span>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item diamonds">
              {{ Auth()->User()->credits }} Diamonds
          </li>
          <li class="nav-item credits">
              {{ Auth()->User()->credits }} Credits
          </li>
        </ul>
      </div>
      <a href="#" class="logo"></a>
    </div>
  <div class="navbar">
    <div class="container">
      <div class="dropdown">
    <button class="dropbtn"><img class="shadowed" src="https://habbo.com.br/habbo-imaging/avatarimage?figure={{ Auth()->User()->look }}&headonly=1">{{ Auth()->User()->username }}</button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>
  </div>
</div>
    <main class="py-4">
        @yield('content')
    </main>
    @include('partials.footer')
  </div>
</body>
</html>