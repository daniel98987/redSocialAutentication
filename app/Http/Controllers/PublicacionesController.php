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
            ->select(
                'users.*',
                'users.nickname',
                'users.name',
                'users.surnames',
                'users.email',
                'publicaciones.id',
                'publicaciones.textoPublicacion',
                'publicaciones.linkImagen',
                'publicaciones.linkVideo',
                'publicaciones.likes',
                'publicaciones.dislikes',
                'publicaciones.linkVideo',
                'publicaciones.created_at'
            )
            ->where('publicaciones.idUsuario', Auth::id())
            ->get();

        return view('principal', array('publicacion' => $publicaciones));
    }
    public function profile($id)
    {

        $perfilUsuario = DB::table('users')
            ->where('users.id', '=', $id)
            ->get();

        return view('principal')->with('perfil', $perfilUsuario);
    }
    public function putLikesProfile($id, $idUsuario)
    {


        $p = Publicaciones::find($id);

        $p->likes =    $p->likes + 1;

        $result = $p->save();
        return redirect()->action(
            [PublicacionesController::class, 'profile'],
            ['id' => $idUsuario]
        );
    }
    public function putDislikesProfile($id, $idUsuario)
    {





        $p = Publicaciones::find($id);

        $p->dislikes =    $p->dislikes + 1;

        $result = $p->save();
        return redirect()->action(
            [PublicacionesController::class, 'profile'],
            ['id' => $idUsuario]
        );
    }
    public function putLikesProfileMuro($id)
    {


        $p = Publicaciones::find($id);

        $p->likes =    $p->likes + 1;

        $result = $p->save();
        return redirect('/muro');
    }
    public function putDislikesProfileMuro($id)
    {





        $p = Publicaciones::find($id);

        $p->dislikes =    $p->dislikes + 1;

        $result = $p->save();
        return redirect('/muro');
    }
    public function postPublicacion(Request $req)
    {



        $p = new Publicaciones();
        if (isset($req->linkImagen)) {
            $p->textoPublicacion = $req->textoPublicacion;
            $p->linkImagen = $req->linkImagen;
            $p->linkVideo = '';
            $p->likes =  0;
            $p->dislikes = 0;
            $p->idUsuario =  $req->id;


            $result = $p->save();
        } else {
            $p->textoPublicacion = $req->textoPublicacion;
            $p->linkImagen = '';
            $p->linkVideo = '';
            $p->likes =  0;
            $p->dislikes = 0;
            $p->idUsuario =  $req->id;
            $result = $p->save();
        }



        if ($result) {

            return redirect()->action(
                [PublicacionesController::class, 'profile'],
                ['id' => $req->id]
            );
        } else {
            return ["result" => "Data no guardada"];
        }
    }

    public function destroy($id, $idUsuario)
    {
        DB::delete('delete from comentarios where idPublicacion = ?', [$id]);
        DB::delete('delete from publicaciones where id = ?', [$id]);


        notify()->success('Publicacion Eliminada');
        return redirect()->action(
            [PublicacionesController::class, 'profile'],
            ['id' => $idUsuario]
        );
    }
}
