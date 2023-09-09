@extends('layouts.main')
@section('title', 'Subir nuevo proyecto')

@section('content')
  <div id="project-form">
    <form action="{{route('projects.store')}}" method="POST">
      @csrf
      @if (session('success'))
        <h6>{{ session('success') }}</h6>
      @endif
      @error('name')
          <h5 class="error">{{ $message }}</h5>
      @enderror
      <div>
        <label for="name">Nombre del proyecto:</label>
        <input type="text" name="name" id="name">
      </div>
      @error('po_exist')
          <h5 class="error">{{ $message }}</h5>
      @enderror
      <div>
        <input type="radio" name="product_owner" id="existing" value="1" checked>
        <label for="existing">Seleccionar Product Owner registrado</label>
        <select name="po_exist" id="po_exist">
          <option value="0">Seleccione PO</option>
          @foreach ($product_owners as $po)
          <option value="{{ $po->po_id }}">{{ $po->name }}</option>
          @endforeach
        </select>
      </div>
      @error('po_new')
          <h5 class="error">{{ $message }}</h5>
      @enderror
      <div>
        <input type="radio" name="product_owner" id="new" value="0">
        <label for="new">Registrar nuevo Product Owner</label>
        <input type="text" name="po_new" id="po_new" disabled>
      </div>
      <div>
        <label for="category">Categoría:</label>
        <input type="text" name="category" id="category">
      </div>
      <div>
        <label for="cost">Costo:</label>
        <input type="number" name="cost" id="cost">
      </div>
      <div>
        <a href="{{ route('projects.index') }}">Volver</a>
        <button type="submit">Subir proyecto</button>
      </div>
    </form>
  </div>
@endsection
@section('footer-js')
  @vite('resources/js/create.js')
@endsection