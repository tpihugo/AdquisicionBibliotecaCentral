<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $books = Libro::limit('500')->get();
      $vsbooks = $this->cargarDT($books);
      return view('libros.index')->with('books', $vsbooks);
    }

    function cargarDT($query){
      $books = [];
      foreach ($query as $key => $value) {

       $edit =  route('libros.edit', $value['id']);
       $acciones = '';
       $acciones = '
           <div class="btn-acciones">
               <div class="btn-circle">
                   <a href="'.$edit.'" class="btn btn-success" title="Actualizar">
                       <i class="far fa-edit"></i>
                   </a>
               </div>
           </div>
       ';
       $books[$key] = array(
           $acciones,
            $value['num_adquisicion'],
            $value['titulo'],
            $value['autor'],
            $value['editorial'],
            $value['pais'],
            $value['anio'],
            $value['num_paginas'],
            $value['procedencia'],
            $value['clasificacion'],
            $value['ubicacion'],
            $value['codigo'],
            $value['fechaDeRegistro'],
        );
      }
      return $books;
    }

    public function search(Request $request){
        $validateData = $this->validate($request,[
           'search'=>'required'
           ]);

       $fieldSelected = $request->input('fieldSelected');
       $search = $request->input('search');
       $books = '';

       if(isset($search) && !is_null($search)){
         if($fieldSelected != 'num_adquisicion'){
           $books = Libro::where($fieldSelected,'LIKE','%'.$search.'%')->get();

         }else if ($fieldSelected == 'num_adquisicion'){ //fecha?
           $books = Libro::where($fieldSelected,$search)->get();
         }
       }else{
         return redirect('home')->with(array(
               'message'=>'Debe introducir un término de búsqueda'
           ));
       }
       $vsBooks = $this->cargarDT($books);
       return view('libros.index')->with('books',$vsBooks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $validateData = $this->validate($request,[
      //     'num_adquisicion'=>'required',
      //     'autor'=>'required',
      //     'titulo'=>'required',
      //     'editorial'=>'required',
      //     'pais'=>'required',
      //     'anio'=>'required',
      //     'num_paginas'=>'required',
      //     'procedencia'=>'required',
      //     'clasificacion'=>'required',
      //     'ubicacion'=>'required',
      //     'codigo'=>'required',
      //     'fechaDeRegistro'=>'required',
      // ]);

      $newBook = new Libro();

      $newBook->num_adquisicion = $request->input('num_adquisicion');
      $newBook->autor = $request->input('autor');
      $newBook->titulo = $request->input('titulo');
      $newBook->editorial = $request->input('editorial');
      $newBook->pais = $request->input('pais');
      $newBook->anio = $request->input('anio');
      $newBook->num_paginas = $request->input('num_paginas');
      $newBook->procedencia = $request->input('procedencia');
      $newBook->clasificacion = $request->input('clasificacion');
      $newBook->ubicacion = $request->input('ubicacion');
      $newBook->codigo = $request->input('codigo');
      $newBook->fechaDeRegistro = $request->input('fechaDeRegistro');
      $newBook->save();

      return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $book = Libro::find($id);
        return view('libros.edit')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Libro::find($id);
        $book->num_adquisicion = $request->input('num_adquisicion');
        $book->autor = $request->input('autor');
        $book->titulo = $request->input('titulo');
        $book->editorial = $request->input('editorial');
        $book->pais = $request->input('pais');
        $book->anio = $request->input('anio');
        $book->num_paginas = $request->input('num_paginas');
        $book->procedencia = $request->input('procedencia');
        $book->clasificacion = $request->input('clasificacion');
        $book->ubicacion = $request->input('ubicacion');
        $book->codigo = $request->input('codigo');
        $book->fechaDeRegistro = $request->input('fechaDeRegistro');
        $book->update();

        return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        //
    }
}
