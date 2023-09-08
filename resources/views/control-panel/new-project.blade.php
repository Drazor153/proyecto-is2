@extends('layouts.main')
@section('title', 'Nuevo proyecto')

@section('content')
  <form action="{{route('new-project')}}" method="POST">
    @csrf
    <div>
      <label for="name">Nombre del proyecto:</label>
      <input type="text" name="name" id="name">
    </div>
    <div>
      <label for="category">Categoría:</label>
      <input type="text" name="category" id="category">
    </div>
    <div>
      <label for="cost">Costo:</label>
      <input type="number" name="cost" id="cost">
    </div>
    <button type="submit">Subir proyecto</button>
  </form>
@endsection