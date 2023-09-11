@extends('auth.head')

@section('title', 'Iniciar sesión')

@section('content')
  <form action="{{route('auth.login')}}" method="POST">
    @csrf
    <h2>Inicio de sesión </h2>
    <div class="row mb-3">
      <label for="userNameInput" class="form-label">Nombre de usuario o email</label>
      <input id="userNameInput" type="text" class="form-control" name="name">
    </div>
    <div class="row mb-3">
      <label for="passwordInput1" class="form-label">Contraseña</label>
      <input id="passwordInput1" type="password" class="form-control" name="password">
    </div>
    @if ($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <button type="submit" class="btn btn-primary">Registrarse</button>
  </form>
@endsection