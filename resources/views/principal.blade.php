@extends('layout.home')


@section('content')

<?php

use App\Models\Chat_usuarios;
use App\Models\Mensajes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

$idPropio = Auth::id();
$nameAmigo = "";


?>

<body style="background-color: #9B9B9B;">
    <div class="container-fluid" style="background-color: #767070;

;padding: 5px;">
        <div class="row justify-content-center" style="margin-top: 90px;color: #00d1ff;">
            <div class="col-8" style="
               display: flex; justify-content:center;
               
                ">
                <img src="/images/user8.png" width="120" height="120" >
        
            </div>
            <div class="col-12" style="text-align: center;">
            <span> <b style="font-size: larger;">{{ auth()->user()->name}} </b> </p></span>
                <p style="text-align: center;"> {{ auth()->user()->email}}</b>   </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <h5 class="card-header">Agregar Publicacion</h5>
                    <div class="card-body">
                        {{ Auth::user()->name }}
                        
                        <form action="/publicacion/create/{{$idPropio}}" method="POST">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">¿Que estas pensando?</label>

                                <textarea class="form-control" id="tarea1" name="textoPublicacion" id="textoPublicacion"></textarea>
                            </div>
                            <button class="btn  btn-info btn-round btn-block" type="submit">Publicar</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="col-8">
                @foreach( $publicacion as $publi )
                <div class="card" style="margin-top: 10px;">
                    <h5 class="card-header">
                        <div class="row">
                            <div class="col-4">Nick: {{$publi->nickname}} </div>
                            <div class="col-4">Fecha: {{$publi->created_at}} {{$publi->id}} </div>
                            <div class="col-4">
                            <form action="/publicaciones/{{$publi->id}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="btn btn-danger" type="submit"> Eliminar Publicacion</button> 


                                </form>
                            
                            
                            
                            
                            
                            </div>
                        </div>
                        
                    </h5>
                    <div class="card-body">
                        <p class="card-text">{{$publi->textoPublicacion}}</p>
                        <div class="mt-4 mb-4">
                            <div style="  border-bottom: solid 5px grey;margin-left: 10px;"></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <form action="/publicacion/like/ {{$publi->id}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-color="dark" style="min-width: 200px;">Like </button><span style="margin-right: 10px;margin-left: 10px;">{{$publi->likes}}</span>


                                </form>
                            </div>
                            <div class="col-6">
                                <form action="/publicacion/dislike/{{$publi->id}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="btn btn-outline-danger" data-mdb-ripple-color="dark " style="min-width: 200px;">Dislike </button><span style="margin-right: 10px;margin-left: 10px;">{{$publi->dislikes}} </span>



                                </form>
                            </div>
                        </div>


                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</body>

@endsection