@extends('layouts.plantilla')
@section('title','reservas')
@section('contenido')


<div class="mt-3">
<div class="row row-cols-4 g-1">
    @foreach($reserves as $row)
    
    
 <div class="col">

<div class="card bg-dark border-success shadow-lg" style="width: 18rem;margin-top:20px;margin-bottom:30px;margin-left:20px;margin-right:20px">
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
      <form action="{{url('reserves/delete',[$row->id,$row->id_movie])}}" method="POST">
        @csrf
        @method("delete")
        <button class="btn btn-danger" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
        </svg> Eliminar Reserva</button>
      </form>
      <br>
    <div class="card-footer bg-transparent border-success text-white">
    {{$row->status}}
    </div>

  </div></div>
</div>
@endforeach
</div>
</div>

@endsection