@extends('layouts.main')
@section('title', 'Editando proyecto')

@section('content')
  <div id="project-form">
    <form action="{{ route('projects.update', ['project' => $project->project_id]) }}" method="POST">
      @method('PATCH')
      @csrf
      @if (session('success'))
        <h6>{{ session('success') }}</h6>
      @endif
      @error('name')
          <h5>{{ $message }}</h5>
      @enderror
      <div>
        <label for="name">Nombre del proyecto:</label>
        <input type="text" name="name" id="name" value="{{ $project->name }}">
      </div>
      <div>
        <label for="category">Categoría:</label>
        <input type="text" name="category" id="category" value="{{ $project->category }}">
      </div>
      <div>
        <label for="cost">Costo:</label>
        <input type="number" name="cost" id="cost" value="{{ $project->cost }}">
      </div>
      <div>
        <a href="{{ route('projects.index') }}">Volver</a>
        <button type="submit">Modificar proyecto</button>
      </div>
    </form>
  </div>

@endsection