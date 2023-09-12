@extends('layouts.main')
@section('title', 'Gestion de proyectos')

@section('content')
  <div class="container-fluid" id="projects-table">
    @if (session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row text-center">
      <div class="col">
        <a class="btn btn-success" href="{{ route('projects.create') }}">Subir nuevo proyecto</a>
      </div>
    </div>
    <div class="row">
      <table class="table table-hover col text-center">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Product Owner</th>
            <th scope="col">Categoría</th>
            <th scope="col">Costo estimado</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($projects as $project)  
          <tr>
            <th scope="row">{{ $project->project_id }}</th>
            <td>{{ $project->name }}</td>
            <td>{{ $project->productOwner->name }}</td>
            <td>{{ $project->category }}</td>
            <td>{{ '$'.number_format($project->cost, 0, ',', '.') }}</td>
            <td>{{ $project->status }}</td>
            <td>
              <div class="row text-nowrap">
                <span class="col-4">
                  @php
                      $disabled = strcmp($project->status, 'Finalizado') === 0;
                  @endphp
                  <form action="{{ route('projects.next', ['project' => $project->project_id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="{{$project->status}}">
                    <button class="btn btn-primary" type="submit" {{ $disabled ? 'disabled' : '' }}>{{ $disabled ? 'Proyecto finalizado': 'Marcar como finalizado' }}</button>
                  </form>
                </span>
                <span class="col-4">
                  <a class="btn btn-secondary" href='{{ route('projects.edit', ['project' => $project->project_id]) }}'>Modificar proyecto</a>
                </span>
                <span class="col-4">
                  <form action="{{ route('projects.destroy', ['project' => $project->project_id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit">Eliminar proyecto</button>
                  </form>
                </span>
              </div>
            </td>
          </tr>
          @empty
            <tr>
              <td colspan="7">No se han encontrado resultados</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

@endsection