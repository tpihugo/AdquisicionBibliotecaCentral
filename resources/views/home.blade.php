
@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container">

          <h1>HOME</h1>

          <div class="">
            <a href="{{route('libros.index')}}">Consultar libros</a>
          </div>
          <div class="">
            <a href="{{route('libros.create')}}">Crear libro</a>
          </div>


          <form action="{{route('searchBook')}}" method="POST" enctype="multipart/form-data" class="col-12">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>Debe de escribir un criterio de búsqueda</ul>
                    </div>
                @endif

                <br>
                <div class="row align-items-center">
                    <div class="col-md-2 offset-md-1 text-end">
                        <h3 class="card-title"><span class="text-success"><i class="fa fa-search"></span></i> Búsqueda</3>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="search" name="search" />
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success">Buscar</button>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" aria-label="Default select example" id="fieldSelected" name="fieldSelected">
                            <option selected value="num_adquisicion">Numero de adquisicion o inventario</option>
                            <option value="autor">Autor</option>
                            <option value="titulo">Titulo</option>
                            <option value="procedencia">Procedencia</option>
                            <option value="codigo">Codigo de barras</option>
                            <option value="fechaDeRegistro">Fecha de registro</option>
                          </select>
                    </div>


                </div>
            </form>


        </div>
    </div>
@endsection
