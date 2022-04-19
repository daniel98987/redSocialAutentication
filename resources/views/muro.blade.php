@extends('layout.home')


@section('content')

<?php

use App\Models\Chat_usuarios;
use App\Models\Mensajes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

$idPropio = Auth::id();
$nameAmigo = "";


?>

<?php
$publicaciones = DB::table('users')
    ->join('publicaciones', 'users.id', '=', 'publicaciones.idUsuario')
    ->select(
        'users.id as userPubli',
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
    ->get();

?>


<div class="row justify-content-center ">
    <div class="col-8">
        @foreach( $publicaciones as $publi )
        <div class="card mb-5" style="margin-top: 10px;border-radius: 20px;border: 3px solid green;">
            <h5 class="card-header">
                <div class="row ">
                    <div class="col-5">
                    <b>Publicado por:</b>
                                 
                    <a href="/profile/{{$publi->userPubli}}" class="col-5">  {{$publi->name}}</a>
                
                </div>
                    <div class="col-6">



                    </div>


                </div>

            </h5>
            <div class="card-body">
                <div>
                    <div class="alert alert-secondary" role="alert">
                        <p class="card-text" style="text-align: start;font-size: 20px;">{{$publi->textoPublicacion}}</p>
                    </div>

                </div>
                @if($publi->linkImagen)
                <img src="{{$publi->linkImagen}}" style="width: 100%;">
                @endif


                <div class="mt-4 mb-4">
                    <div style="  border-bottom: solid 5px grey;margin-left: 10px;"></div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-4">
                        <form action="/publicacion/likeMuro/ {{$publi->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-color="dark" style="min-width: 200px;">Like </button><span style="margin-right: 10px;margin-left: 10px;">{{$publi->likes}}</span>
                        </form>
                    </div>
                    <div class="col-4">
                        <form action="/publicacion/dislikeMuro/{{$publi->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <button type="submit" class="btn btn-outline-danger" data-mdb-ripple-color="dark " style="min-width: 200px;">Dislike </button><span style="margin-right: 10px;margin-left: 10px;">{{$publi->dislikes}} </span>



                        </form>
                    </div>
                </div>
                <form method="POST" action="/comentario/{{$publi->id}}/{{auth()->user()->id }}" class="form-inline mt-4">
                    {{csrf_field()}}
                    <div class="row justify-content-center ">


                        <div class="col-12">

                            <div class="row">
                                <div class="col-10">
                                    <input class="form-control" name="textoPublicacion" id="textoPublicacion" placeholder="Escribe un comentario ...">

                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary mb-2" style="background-color: #213e35!important;color: white;border-radius: 20px;">Comentar</button>

                                </div>

                            </div>
                        </div>










                    </div>
                </form>
                <?php
                $comentarios = DB::table('users')
                    ->join('comentarios', 'users.id', '=', 'comentarios.idUsuario')
                    ->select(
                        'comentarios.textoComentario',
                        'users.name',
                        'users.id',
                        'users.surnames',
                        'comentarios.created_at'
                    )
                    ->where('comentarios.idPublicacion', '=', $publi->id)
                    ->get();

                ?>

                @if($comentarios)
                @foreach( $comentarios as $coment )
                <div class="row justify-content-start">
                    <div class="col-12">
                        <div class="card mb-2 mt-2">
                            <div class="card-body">
                                <a href="/profile/{{$coment->id}}">{{$coment->name}} {{$coment->surnames}}</a>
                                <div class="alert alert-info" role="alert" style="margin-top: 20px!important;margin-bottom: 20px!important">

                                    <p class="card-text"> {{$coment->textoComentario}}</p>


                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-2">
                                        <p class="card-text"> {{ date('d-m-Y', strtotime($coment->created_at))}}</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                @endif

            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection