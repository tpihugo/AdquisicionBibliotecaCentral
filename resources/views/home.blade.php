
@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container">

          @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif


  <div class="d-flex justify-content-center">
   <div class="card text-center" style="width: 14rem;" >
      <img  src="{{ asset('img/adquisiciones.jpeg') }}" alt="logo adquisiciones">
      <div class="card-body">

          <h5 class="card-title">Adquisiciones biblioteca central</h5>

          @if(!Auth::check())
            <!-- <p class="card-text">Adquisiciones biblioteca central</p> -->
            <a href="{{route('login')}}" class="btn btn-primary">Iniciar sesion</a>
            @else
              <a href="{{route('libros.create')}}" class="btn btn-primary">Crear libro</a>
              <a href="{{route('logs')}}" class="btn btn-outline-secondary">Historial de acciones</a>
          @endif

      </div>
      @if(Auth::check())
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <!-- <input type="submit" value="Cerrar sesion"> -->
            <button type="submit" name="button" class="btn btn-danger">Cerrar sesion</button>
        </form>
      @endif

  </div>
  </div>


<div class="card-body">
  {{--
      @if(Auth::check())
        <a href="{{route('libros.create')}}">Crear libro</a>

          <form method="POST" action="{{ route('logout') }}">
              @csrf
              <input type="submit" value="Cerrar sesion">
          </form>



      @endif
      --}}

          <form action="{{route('searchBook')}}" method="POST" enctype="multipart/form-data" class="col-12">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>Debe de escribir un criterio de búsqueda</ul>
                    </div>
                @endif

                <br>
                <div class="row align-items-center">
                    <div class="col-md-3 offset-md-1 text-end">
                        <h3 class="card-title"><span class="text-success"><i class="fa fa-search"></span></i> Búsqueda</3>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="search" name="search" />
                    </div>
                    <div class="col-md-4">
                      <div class="mb-3">
                        <label for="fieldSelected">Buscar por:</label>
                        <select class="form-select" aria-label="Default select example" id="fieldSelected" name="fieldSelected">
                            <option selected value="num_adquisicion">Numero de adquisicion o inventario</option>
                            <option value="autor">Autor</option>
                            <option value="titulo">Titulo</option>
                            <option value="procedencia">Procedencia</option>
                            <option value="codigo">Codigo de barras</option>
                            <option value="fechaDeRegistro">Fecha de registro</option>
                        </select>
                      </div>
                      <div class="mb-2">
                        <button type="submit" class="btn btn-success">Buscar</button>
                      </div>
                    </div>

                </div>
            </form>
        </div>


        </div>
    </div>
@endsection
