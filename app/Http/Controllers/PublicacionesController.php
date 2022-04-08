<?php

namespace App\Http\Controllers;
use App\Models\Publicaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicacionesController extends Controller
{



    

    public function getPublicaciones()
    {
        // $movie= new Movie;
        $publicacionesTodas =  Publicaciones::all();

        $publicaciones = DB::table('users')
        ->join('publicaciones', 'users.id', '=', 'publicaciones.idUsuario')
        ->select('users.*', 'users.nickname', 'users.name', 
        'users.surnames',  'users.email','publicaciones.id','publicaciones.textoPublicacion'
        ,'publicaciones.linkImagen','publicaciones.linkVideo','publicaciones.likes'
        ,'publicaciones.dislikes','publicaciones.linkVideo','publicaciones.created_at')
        ->where('publicaciones.idUsuario', Auth::id())
        ->get();
 
        return view('principal', array('publicacion' => $publicaciones));
    }

    public function putLikes($id)
    {


        $p = Publicaciones::find($id);

        $p->likes =    $p->likes+1;

        $result = $p->save();
        return redirect()->action(
            [PublicacionesController::class, 'getPublicaciones']
      
        );
    }
    public function putDislikes($id)
    {


    
      

        $p = Publicaciones::find($id);

        $p->dislikes =    $p->dislikes+1;

        $result = $p->save();
        return redirect()->action(
            [PublicacionesController::class, 'getPublicaciones']
      
        );
    }
    public function postPublicacion(Request $req){




        $p = new Publicaciones();
        $p->textoPublicacion = $req->textoPublicacion;
        $p->linkImagen = '';
        $p->linkVideo = '';
        $p->likes =  0;
        $p->dislikes = 0;
        $p->idUsuario =  $req->id;
      
        $result=$p->save();
        if($result){
    
            return redirect()->to('/');

        }else{
            return ["result"=>"Data no guardada"];

        }

    }

    public function destroy($id)
    {
        DB::delete('delete from publicaciones where id = ?', [$id]);


        notify()->success('Publicacion Eliminada');
        return redirect()->action(
            [PublicacionesController::class, 'getPublicaciones']
      
        );
    
    }
}
