@extends('layouts.plantilla')
@section('title','editar')
@section('contenido')

<div class="card mx-auto" style="width: 28rem;position:relative;top:30px">
<div class="card-header bg-dark text-white">Editar Pelicula</div>
<div class="card-body">

    <form id="frmovie" method="POST" action="{{url('movies',[$movie])}}" enctype="multipart/form-data" >
        @method("put")
        @csrf
        <div class="mb-3">
            <img src="/images/{{$movie->image}}" alt="" width="100px" height="100px"><br><br>
            <input type="file" name="image" class="custom-file-input" id="imagen" lang="es" accept="image/*">
            <br><br>
            <label for="title">Titulo:</label>
            <input type="text" name="title" value="{{$movie->title}}" id="name" class="form-control" ><br>
            <label for="description">Descripcion:</label>
            <textarea class="form-control" name="description" id="description" rows="3" >{{$movie->description}}</textarea><br>
            <select name="id_categorie" class="form-select">
            <option value="">Categoria</option>
              @foreach($categorie as $row)
              @if($row->id == $movie->id_categorie)
              <option selected value="{{$row->id}}"> {{$row->name}}</option>
              @else
              <option value="{{$row->id}}">{{$row->name}}</option>
              @endif
              @endforeach          
            </select>

        </div>
        <button class="btn btn-success float-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
          </svg> Actualizar</button>

      </form>
</div>
</div>


  
@endsection