@extends('layouts.main')
@section('title', 'Subir nuevo proyecto')

@section('content')
  <div class="container py-5" id="project-form" style="max-width: 800px">
      <form action="{{route('projects.store')}}" method="POST">
        @csrf
        @if (session('success'))
          <h6>{{ session('success') }}</h6>
        @endif
        
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="name">Nombre del proyecto:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="name" id="name">
          </div>
        </div>

        @error('po_exist')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="row mb-3">
          <div class="form-check col-sm-3">
            <input class="form-check-input" type="radio" name="product_owner" id="existing" value="1" checked>
            <label class="form-check-label" for="existing">
              Seleccionar Product Owner registrado
            </label>
          </div>
          <div class="col-sm-9">
            <select class="form-select" name="po_exist" id="po_exist">
              <option value="0">Seleccione PO</option>
              @foreach ($product_owners as $po)
              <option value="{{ $po->po_id }}">{{ $po->name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        @error('po_new')
            <h5 class="error">{{ $message }}</h5>
        @enderror
        <div class="row mb-3">
          <div class="form-check col-sm-3">
            <input class="form-check-input" type="radio" name="product_owner" id="new" value="0">
            <label class="form-check-label" for="new">
              Registrar nuevo Product Owner
            </label>
          </div>
          <div class="col-sm-9">
            <input class="form-control" type="text" name="po_new" id="po_new" disabled>
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form=label" for="category">Categoría:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="category" id="category">
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="cost">Costo:</label>
          <div class="col-sm-10">
            <input class="form-control" type="number" name="cost" id="cost">
          </div>
        </div>

        <div class="row">
          <span class="col text-center">
            <a class="btn btn-secondary" href="{{ route('projects.index') }}">Volver</a>
          </span>
          <span class="col text-center">
            <button class="btn btn-primary" type="submit">Subir proyecto</button>
          </span>
        </div>
      </form>
  </div>
@endsection
@section('footer-js')
  @vite('resources/js/create.js')
@endsection