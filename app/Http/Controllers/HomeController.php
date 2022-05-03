<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class HomeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    // SELECT fields FROM table ORDER BY id DESC LIMIT 1;

      $lastInserted = Libro::where('activo',1)->orderBy('num_adquisicion','desc')->take(1)->pluck('num_adquisicion');
      return view('home')->with('lastNum_adquisicion',$lastInserted[0]);
  }


  public function guestIndex()
  {
      return view('home_guest');
  }



}
