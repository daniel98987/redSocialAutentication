<?php

    use App\Models\Amistades;
    use Illuminate\Support\Facades\Auth;

    $idPropio = Auth::id();
    $chatUsuarios = Amistades::join('users','amistades.idUsuarioAmigo','=','users.id')->get()
    ->where("idUsuarioPrincipal",$idPropio)
    ->where("rented",1);
    if(sizeof($chatUsuarios)===0){
        $chatUsuarios = Amistades::join('users','amistades.idUsuarioPrincipal','=','users.id')->get()
        ->where("idUsuarioAmigo",$idPropio)
        ->where("rented",1);
    }
    
?>
<div id="principalChatAmigos" class="principal-chat-amigos">
    <div id="closeFriends" class="close">
        <div class="name-friend">
            Chats
        </div>
        <div class="container-buttons">
            <button id="button-close-amigos" class="buttons-control">-</button>
        </div>
    </div>
    <div id="row">
        <div class="chat-content-g-amigos" id="chat-content-g-amigos">
            <ul id="chat-content-amigos">
                @foreach ($chatUsuarios as $usuario)
                    <button class="name-friend open-chat" onclick="openChat('<?=$usuario->id?>')">
                        {{$usuario->name.' '.$usuario->surnames}}
                    </button>
                @endforeach
            </ul>
        </div>
    </div>
</div>