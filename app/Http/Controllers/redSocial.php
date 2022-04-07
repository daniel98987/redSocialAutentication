<?php

namespace App\Http\Controllers;

use App\Models\Amistades;
use App\Models\Publicaciones;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class redSocial extends Controller
{
    public function getAmigosNo()
    {
       $noPrincipal = DB::table('users')
       ->select('users.id', 'users.nickname', 'users.name', 
       'users.surnames')
       ->whereNotIn('users.id', function($q){
           $q->select('amistades.idUsuarioPrincipal')->from('amistades')    
           ->where('amistades.idUsuarioAmigo', '=', Auth::id());  
       })
       ->whereNotIn('users.id', function($q){
        $q->select('amistades.idUsuarioAmigo')->from('amistades')
        ->where('amistades.idUsuarioPrincipal', '=', Auth::id());  
      })
      ->where('users.id', '!=', Auth::id())
        
       ->get();


         return view('amigos',array('usuarios'=>$noPrincipal));
    }



 
    public function addAmigos($idAmigo)
    {


        $p = new Amistades();
        $p->notificacionEnvio = 0;
        $p->rented =  0;
        $p->idUsuarioPrincipal = Auth::id();
        $p->idUsuarioAmigo =$idAmigo;
        $result = $p->save();
        return redirect()->action(
            [redSocial::class, 'getAmigosNo']
      
        );
    }
 
    public function solicitudes()
    {
        $confirmarAmigos = DB::table('users')
        ->select('users.id', 'users.nickname', 'users.name', 
        'users.surnames')
        ->whereIn('users.id', function($q){
            $q->select('amistades.idUsuarioPrincipal')->from('amistades')
            ->where('amistades.idUsuarioPrincipal', '!=', Auth::id())  
            ->where('amistades.idUsuarioAmigo', '=', Auth::id())  
            ->where('amistades.rented', '=',0)  ;
        })
      
        ->get();
        $pendienteAmigos = DB::table('users')
        ->select('users.id', 'users.nickname', 'users.name', 
        'users.surnames')
        ->whereIn('users.id', function($q){
            $q->select('amistades.idUsuarioAmigo')->from('amistades')
            ->where('amistades.idUsuarioPrincipal', '=', Auth::id())  
            ->where('amistades.idUsuarioAmigo', '!=', Auth::id())  
            ->where('amistades.rented', '=',0)  ;
        })
      
        ->get();
        return view('solicitud',array('confirmarAmigos'=>$confirmarAmigos),array('pendienteAmigos'=>$pendienteAmigos));
    }

    public function destroyConfirmar($id)
    {
        
        DB::table('amistades')
        ->where('amistades.idUsuarioPrincipal', '=', $id)
        ->where('amistades.idUsuarioAmigo', '=', Auth::id())
        ->delete();


        return redirect()->action([redSocial::class, 'solicitudes']);
    }
    public function destroyAmistad($id)
    {
        
        DB::table('amistades')
        ->where('amistades.idUsuarioPrincipal', '=', $id)
        ->where('amistades.idUsuarioAmigo', '=', Auth::id())
        ->delete();
        
        DB::table('amistades')
        ->where('amistades.idUsuarioPrincipal', '=',  Auth::id())
        ->where('amistades.idUsuarioAmigo', '=', $id)
        ->delete();

        return redirect()->action([redSocial::class, 'getAmigosNo']);
    }
    public function destroyPendiente($id)
    {
        
        DB::table('amistades')
        ->where('amistades.idUsuarioPrincipal', '=',  Auth::id())
        ->where('amistades.idUsuarioAmigo', '=', $id )
        ->delete();


        return redirect()->action([redSocial::class, 'solicitudes']);
    }
    public function confirmarAmistad($id)
    {
        $amistad = DB::table('amistades')
            ->select('amistades.id')
            ->where('amistades.idUsuarioPrincipal', '=', $id)  
            ->where('amistades.idUsuarioAmigo', '=',  Auth::id())  
            ->get();
     foreach($amistad as $ami){
                $pr = $ami->id;
              }
              
       error_log($pr);
        $putpeli = Amistades::findOrFail( $pr);
        $putpeli->rented = true;
        $putpeli->save();



        return redirect()->action([redSocial::class, 'solicitudes']);
    }


}
