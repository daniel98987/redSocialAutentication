<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{
    public function getComentarios($idUsuario,$idPublicacion)
    {
        // $movie= new Movie;
        $publicacionesTodas =  Comentarios::all();

        $publicaciones = DB::table('users')
        ->join('comentarios', 'users.id', '=', 'comentarios.idUsuario')
        ->select('comentarios.textoComentario', 'users.name', 
        'users.surnames','comentarios.created_at')
        ->where('comentarios.idUsuario','=',$idUsuario)
        ->where('comentarios.idPublicacion','=',$idPublicacion)
        ->get();
 
        return view('principal', array('comentario' => $publicaciones));
    }

    public function postComentario(Request $req,$idPubli,$idUsuario,$idUserConsultado){




        $p = new Comentarios();
        $p->textoComentario = $req->textoPublicacion;
        $p->idUsuario = $idUsuario;
        $p->idPublicacion  = $idPubli;
    
      
        $result=$p->save();
        if($result){
    
            return redirect()->action(
                [PublicacionesController::class, 'profile'],
                ['id' => $idUserConsultado]);

        }else{
            return ["result"=>"Data no guardada"];

        }

    }
    public function postComentario2(Request $req,$idPubli,$idUsuario){




        $p = new Comentarios();
        $p->textoComentario = $req->textoPublicacion;
        $p->idUsuario = $idUsuario;
        $p->idPublicacion  = $idPubli;
    
      
        $result=$p->save();
        if($result){
    
             return redirect('/muro');

        }else{
            return ["result"=>"Data no guardada"];

        }

    }
    public function postComentarioMuro(Request $req,$idPubli,$idUsuario,){




        $p = new Comentarios();
        $p->textoComentario = $req->textoPublicacion;
        $p->idUsuario = $idUsuario;
        $p->idPublicacion  = $idPubli;
    
      
        $result=$p->save();
        if($result){
    
            return redirect('/muro');
        }else{
            return ["result"=>"Data no guardada"];

        }

    }

}
