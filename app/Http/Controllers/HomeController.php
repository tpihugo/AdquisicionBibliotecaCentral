<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lastInserted = Libro::where('activo',1)
        ->orderBy('num_adquisicion','desc')
        ->take(1)
        ->pluck('num_adquisicion');
        return view('home')->with('lastNum_adquisicion',$lastInserted[0]);
        // return view('home');
    }
}
