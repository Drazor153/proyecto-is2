@extends('layouts.main')
@section('title', 'Gestion de proyectos')

@section('content')
  <div id="projects-table">
    <div>
      <a href="{{ route('projects.create') }}">Subir nuevo proyecto</a>
    </div>
    <table>
      <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Product Owner</th>
        <th>Categoría</th>
        <th>Costo estimado</th>
        <th>Estado</th>
        <th>Acciones</th>
      </thead>
      <tbody>
        @foreach ($projects as $project)  
        <tr>
          <th>{{ $project->project_id }}</th>
          <td>{{ $project->name }}</td>
          <td>{{ $project->productOwner->name }}</td>
          <td>{{ $project->category }}</td>
          <td>{{ $project->cost }}</td>
          <td>{{ $project->status }}</td>
          <td>
            <button>Marcar como terminado</button>
            <a href='{{ route('projects.edit', ['project' => $project->project_id]) }}'>Modificar proyecto</a>
            <form action="{{ route('projects.destroy', ['project' => $project->project_id]) }}" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit">Eliminar proyecto</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection