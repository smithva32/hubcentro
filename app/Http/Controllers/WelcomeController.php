<?php

namespace App\Http\Controllers;
use App\Tema;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){

       
        $temasDestacados=Tema::where('destacado',1)->with(['articulos.imagenes'])->orderby('id','desc')->paginate(10);
        return view('welcome')->with(compact('temasDestacados'));
       
    }
   // @foreach($temasDestacados as $temaDestacado)
   // @foreach($temaDestacado->articulos->sortByDesc('id')->take(3) as $articulo)

}
