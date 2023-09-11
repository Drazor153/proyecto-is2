<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- <link rel="stylesheet" href="{{asset('css/home.css')}}"> --}}
  @vite('resources/css/bootstrap.min.css')
  <title>@yield('title')</title>
</head>
<body>
  <nav class="navbar bg-body-tertiary mb-3">
    <div class="container-fluid">
      <a href="{{route('projects.index')}}" class="navbar-brand">Gestor de Proyectos</a>
      <form action="{{route('projects.index')}}" class="d-flex" role="search" method="GET">
        <input class="form-control me-2" type="search" name="search" placeholder="Buscar proyecto" aria-label="Search" value="{{request('search')}}">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </nav>
  @yield('content')

  @yield('footer-js')

</body>
</html>