@extends('layouts.plantilla')
@section('title','admin')
@section('contenido')

<!-- Button trigger modal -->
  <!-- Button trigger modal -->
  <div class="d-flex justify-content-center" style="padding-top:200px;">
    <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
          </svg> Añadir Pelicula
      </button>
    </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Pelicula</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <form action="{{url("movies")}}" method="post" enctype="multipart/form-data">
              @csrf
                <input type="file" name="image" class="custom-file-input" id="imagen" lang="es" accept="image/*" required>
                <label class="custom-file-label" for="imagen">Seleccionar Archivo</label><br><br>
                <label for="title">Titulo:</label>
                <input type="text" name="title" id="name" class="form-control" required>
                <label for="description">Descripcion:</label>
                <textarea class="form-control" name="description" id="description" rows="3" required></textarea><br>
                <select name="id_categorie" class="form-select" required>
                <option selected>Categoria</option>
                  @foreach($categorie as $row)
                  <option value="{{$row->id}}"> {{$row->name}}</option>
                  @endforeach          
                </select>
        </div>
        <div class="modal-footer">
          <button class="btn btn-dark">Guardar</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  
@endsection