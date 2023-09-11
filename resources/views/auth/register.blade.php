@extends('auth.head')

@section('title', 'Registrarse')

@section('content')
  <form action="{{route('auth.register')}}" method="POST">
    @csrf
    <h2>Registro</h2>
    <div class="row mb-3">
      <label for="nameInput" class="form-label">Nombre de usuario</label>
      <input id="nameInput" type="text" class="form-control" name="name">
    </div>
    <div class="row mb-3">
      <label for="emailInput" class="form-label">Correo</label>
      <input id="emailInput" type="email" class="form-control" name="email">
    </div>
    <div class="row mb-3">
      <label for="passwordInput1" class="form-label">Contraseña</label>
      <input id="passwordInput1" type="password" class="form-control" name="password">
    </div>
    <div class="row mb-3">
      <label for="passwordInput2" for="" class="form-label">Confirmar contraseña</label>
      <input id="passwordInput2" type="password" class="form-control" name="password-confirmation">
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