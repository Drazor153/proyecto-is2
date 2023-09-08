@extends('layouts.main')
@section('title', 'Inventario')

@section('content')
@if (session('success'))
    <h6>{{ session('success') }}</h6>
@endif

@error('record')
    
@enderror
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
      <tr>
        <th colspan="7">
          <a href="{{url('/project/create')}}">Agregar nuevo proyecto</a>
        </th>
      </tr>
      <tr>
        <th>1</th>
        <td>Intranet UNA</td>
        <td>Fabian Justo</td>
        <td>Sistema privado</td>
        <td>20.000.000</td>
        <td>En proceso</td>
        <td>
          <button>Marcar como terminado</button>
          <button>Modificar proyecto</button>
          <button>Eliminar proyecto</button>
        </td>
      </tr>
    </tbody>
  </table>

@endsection