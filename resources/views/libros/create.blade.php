@extends('layouts.app')

@section('content')

<div class="container">
    @if(Auth::check())
        @if (session('message'))
            <div class="alert alert-success">
                <h2>{{ session('message') }}</h2>

            </div>
        @endif

        <form action="{{route('libros.store')}}" method="post" enctype="multipart/form-data" class="col-12">
            <div class="row">
                <div class="col">
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <br>

                    </div>
                    <br>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <label for="num_adquisicion">Número de adquisicion o inventario</label>
                            <input readonly type="number" class="form-control" id="num_adquisicion" name="num_adquisicion" value="{{$lastNum_adquisicion}}"  >
                        </div>
                        <div class="col-md-4">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="-"  >
                        </div>

                        <div class="col-md-4">
                            <label for="autor">Autor</label>
                            <input type="text" class="form-control" id="autor" name="autor" value="-"  >
                        </div>
                    </div>

                    <div class="row g-3 align-items-center">

                        <div class="col-md-4">
                            <label for="editorial">Editorial</label>
                            <input type="text" class="form-control" id="editorial" name="editorial" value="-"  >
                        </div>

                        <div class="col-md-4">
                            <label for="pais">Pais</label>
                            <input type="text" class="form-control" id="pais" name="pais" value="-"  >
                        </div>

                        <div class="col-md-4">
                            <label for="anio">Año</label>
                            <input type="text" class="form-control" id="anio" name="anio" value="-"  >
                        </div>
                  </div>

                  <div class="row g-3 align-items-center">

                      <div class="col-md-4">
                          <label for="num_paginas">Numero de paginas</label>
                          <input type="text" class="form-control" id="num_paginas" name="num_paginas" value="-"  >
                      </div>

                      <div class="col-md-4">
                          <label for="procedencia">Procedencia</label>
                          <input type="text" class="form-control" id="procedencia" name="procedencia" value="-"  >
                      </div>

                      <div class="col-md-4">
                          <label for="clasificacion">Clasificacion</label>
                          <input type="text" class="form-control" id="clasificacion" name="clasificacion" value="-"  >
                      </div>
                </div>

                <div class="row g-3 align-items-center">

                    <div class="col-md-4">
                        <label for="ubicacion">Ubicacion</label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="-"  >
                    </div>

                    <div class="col-md-4">
                        <label for="codigo">Codigo de barras</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" value="-"  >
                    </div>

                    <!-- <div class="col-md-4">
                        <label for="fechaDeRegistro">fechaDeRegistro</label>
                        <input type="date" class="form-control" id="fechaDeRegistro" name="fechaDeRegistro" value="{{old('fechaDeRegistro')}}"  >
                    </div> -->
              </div>

              <div class="row g-3 align-items-center">
                	<div class="col-md-6">
                    		<a href="{{ route('home') }}" class="btn btn-danger">Cancelar</a>
                    		<button type="submit" class="btn btn-success">Guardar datos</button>
                	</div>
            	</div>

          </form>

    @else
        El periodo de Registro de Proyectos a terminado
    @endif

</div>

@endsection
