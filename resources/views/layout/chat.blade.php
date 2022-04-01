<?php

use App\Models\Chat_usuarios;
use App\Models\Mensajes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

    $idPropio = Auth::id();
    $nameAmigo = "";
    $idAmigo = $idAmigoGrupo;
    $chatUsuarios = Chat_usuarios::get()->where("idUsuarioUno",$idPropio)->where("idUsuarioDos",$idAmigo)->first();
    $mensajes = [];
    if(isset($chatUsuarios)){
        if(!is_null($chatUsuarios->id)){
            $mensajes = Mensajes::get()->where('idChat',$chatUsuarios->id);
            $amigo = User::find($idAmigo);
            $nameAmigo = $amigo->name." ".$amigo->surnames;
        }
    }else{
        $chatUsuarios = Chat_usuarios::get()->where("idUsuarioDos",$idPropio)->where("idUsuarioUno",$idAmigo)->first();
        if(isset($chatUsuarios)){
            $mensajes = Mensajes::get()->where('idChat',$chatUsuarios->id);
            $amigo = User::find($idAmigo);
            $nameAmigo = $amigo->name." ".$amigo->surnames;
        }
    }
?>
<div id="principalChat" class="principal-chat">
    <div class="close">
        <div class="name-friend">
            {{$nameAmigo}}
        </div>
        <div class="container-buttons">
            <button id="button-close" class="buttons-control">-</button>
            <button class="buttons-control">x</button>

        </div>
    </div>
    <div id="row">
        <div class="chat-content-g" id="chat-content-g">
            <ul id="chat-content">
                @foreach ($mensajes as $mensaje)
                    @if($mensaje->idUsuario === $idPropio)
                        <li class="propio">{{$mensaje->textoMensaje}}</li>
                    @else
                        <li class="amigo">{{$mensaje->textoMensaje}}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="chat-section" id="chat-section">
            <div class="chat-box">
                <input class="input" type="text" id="chatInput" autocomplete="off">
                <img id="send" class="send" src="/images/arrow_circle_right.svg">
            </div>
        </div>
    </div>
</div>