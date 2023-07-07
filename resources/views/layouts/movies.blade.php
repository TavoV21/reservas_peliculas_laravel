@extends('layouts.plantilla')
@section('title','peliculas')
@section('contenido')

<div class="mt-4">
  <div class="container-xxl" >

<div class="row row-cols-1 row-cols-md-4 g-1">
  @foreach($movie as $row)
 <div class="col">

<div class="card bg-dark border-dark shadow-lg" id="listmov" style="width: 18rem;margin-top:20px;margin-bottom:30px;margin-left:20px;margin-right:20px">
    <img src="images/{{$row->image}}" class="card-img-top" alt="..." height="200px">
    <div class="card-body">
      <h5 class="card-title text-white">{{$row->title}}</h5>
      <p class="card-text text-white">{{$row->name}}</p>  

      <a data-bs-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
        Leer Descripcion
      </a>
      <div class="collapse" id="collapseExample">
        <p class="card-text text-white">{{$row->description}}</p>  
    </div>  <br><br>
    <div class="contenedor d-flex">

      @if(auth()->user()->role == 'admin')
      <a href="{{url('movies/edit',[$row])}}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
      </svg> Editar</a>
      <form action="{{url('movies',[$row])}}" method="POST">
        @csrf
        @method("delete")
        <button class="btn btn-danger ms-3" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
        </svg> Eliminar</button>
      </form>
      @else
       <form action="{{url('reserves',[$row->id,$row->image,$row->title,$row->id_categorie,$row->description,$row->status])}}" method="POST">
        @csrf
        @method("post") 
        @if($row->status == 'Reservado')
        <button class="btn btn-secondary" disabled>Reservado</button>     
        @else
        <button class="btn btn-primary">Reservar</button>      
        @endif
      </form>
      @endif
    </div>
      <br>
    <div class="card-footer bg-transparent border-danger text-white">
    {{$row->status}}
    </div>

  </div></div>
</div>
@endforeach

</div>
</div>
</div>
@endsection


