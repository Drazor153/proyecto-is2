<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- <link rel="stylesheet" href="{{asset('css/home.css')}}"> --}}
  @vite(['resources/css/bootstrap.min.css', 'resources/js/bootstrap.bundle.min.js'])
  <title>@yield('title')</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('projects.index') }}">Gestor de Proyectos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <span class="nav-link" >Bienvenido {{auth()->user()->name}} </span>
          </li>
          <li class="nav-item">
            <a class="nav-link link-danger" href="{{ route('auth.logout') }}">Desconectar</a>
          </li>
        </ul>
        <form action="{{route('projects.index')}}" class="d-flex" role="search" method="GET">
          <input class="form-control me-2" type="search" name="search" placeholder="Buscar proyecto" aria-label="Search" value="{{request('search')}}">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>
  @yield('content')

  @yield('footer-js')

</body>
</html>