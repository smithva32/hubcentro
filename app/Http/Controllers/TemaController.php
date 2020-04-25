<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;

class TemaController extends Controller
{
    
    public function show(Tema $tema)
    {
        //$temasTodos = Tema::all();
        //$tema = Tema::find($tema_id);
        //$tema = Tema::where('slug','=',$slug)->first();
        //$articulos=$tema->articulos()->where('activo','=',1)->orderBy('id','desc')->get();
       // $articulos=$tema->articulos()->where('activo','=',1)->with(['imagenes'])->orderBy('id','desc')->paginate(1);
        //return view('tema.articulos')->with(compact('tema', 'articulos'));


        $usuarioAutenticado=true;
        $usuarioBloqueado=false;
        $usuarioVerificado=true;

        if($tema->suscripcion)
        {
            if(auth()->check())
            {
                if(!is_null(auth()->user()->email_verified_at))
                {
                    if(auth()->user()->bloqueado)
                    {
                        $usuarioBloqueado=true;
                        return view('tema.articulos')->with(compact('tema','usuarioAutenticado','usuarioBloqueado','usuarioVerificado'));
                    }
                    $articulos=$tema->articulos()->with(['imagenes'])->orderBy('id','desc')->paginate(3);
                    return view('tema.articulos')->with(compact('tema', 'articulos', 'usuarioAutenticado','usuarioBloqueado','usuarioBloqueado','usuarioVerificado'));  
               }
                $usuarioVerificado=false;
                return view('tema.articulos')->with(compact('tema', 'usuarioAutenticado','usuarioBloqueado','usuarioBloqueado','usuarioVerificado'));         
            }
            $usuarioAutenticado=false;
            return view('tema.articulos')->with(compact('tema','usuarioAutenticado','usuarioBloqueado','usuarioVerificado'));
        }

        $articulos=$tema->articulos()->with(['imagenes'])->orderBy('id','desc')->paginate(3);
        return view('tema.articulos')->with(compact('tema', 'articulos', 'usuarioAutenticado','usuarioBloqueado','usuarioVerificado'));  
    }

}
