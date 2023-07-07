<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>    
    <style>
      .btn-1{
        background-color: red;
        color: white;
      }
      .btn-1:hover{
        background-color: white;
        color: red;
      }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
          @if(auth()->check())
          <a class="navbar-brand text-white ms-3" href="/movies">Peliculas</a>
          @if(auth()->user()->role == 'admin')
          <a class="navbar-brand text-white ms-3" href="/admin">Añadir Pelicula</a>
          @else
          <a class="navbar-brand text-white ms-3" href="/reserves">Mis Reservas</a>
          @endif
          @endif
      
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
              @if(auth()->check())
              <div style="position: relative;right:15px;top:8px;">
              <li class="nav-item">
                <p class="text-white"> Bienvenido {{auth()->user()->name}} </p>
              </li>
            </div>
              <li class="nav-item">
                <a class="nav-link rounded btn-1" href="/logout" >Cerrar Sesion</a>
              </li>
             @else
             <li class="nav-item">
              <a class="nav-link text-white font-semibold" href="/login">Iniciar Sesion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="/register">Registro</a>
            </li>

             @endif
            </ul>
          
          </div>
        </div>
      </nav>
        <div class="container-fluid">
            @yield('contenido')
        </div>
</body>
</html>