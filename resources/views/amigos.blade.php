@extends('layout.home')

@section('content')


<!-- /images/inicio.png -->

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

$amistadesAmigos = DB::table('users')
  ->select(
    'users.id',
    'users.nickname',
    'users.name',
    'users.surnames'
  )
  ->whereIn('users.id', function ($q) {
    $q->select('amistades.idUsuarioAmigo')->from('amistades')

      ->where('amistades.rented', '=', 1);
  })
  ->where('users.id', '!=', Auth::id())

  ->get();
$amistadesPrincipales = DB::table('users')
  ->select(
    'users.id',
    'users.nickname',
    'users.name',
    'users.surnames'
  )
  ->whereIn('users.id', function ($q) {
    $q->select('amistades.idUsuarioPrincipal')->from('amistades')

      ->where('amistades.rented', '=', 1);
  })
  ->where('users.id', '!=', Auth::id())

  ->get();
$result = $amistadesAmigos->merge($amistadesPrincipales);


?>

<div class="container">
  <div class="row mb-4 mt-4 p-5" style="border-radius: 20px;border: 3px solid green">
    <h2 style="text-align: center;font-size: larger;" class="mb-5"><b>Lista de amigos: </b> {{ auth()->user()->name}}</h2>
    <table class="table " class="">
      <thead>
        <tr>
          <th scope="col">nickname</th>
          <th scope="col">nombres</th>
          <th scope="col">apellidos</th>


        </tr>
      </thead>
      <tbody>

        @foreach ($result as $usuario)
        <tr>
          <td>{{$usuario->nickname}}</td>
          <td>{{$usuario->name}}</td>
          <td>{{$usuario->surnames}}</td>
          <td>

            <form action="/solicitud/eliminarAmistad/{{$usuario->id}}" method="POST">
              {{csrf_field()}}
              {{method_field('delete')}}
              <button type="submit" class="btn  btn-danger">Eliminar amistad</button>
            </form>


          </td>



        </tr>

        @endforeach




      </tbody>
    </table>



  </div>

  <div class="row mb-4 mt-4 p-5" style="border-radius: 20px;border: 3px solid green">
    <div class="col-12 mt-3">
      <p style="text-align: center;">

      <h2 style="text-align: center;font-size: larger;"> <b> Personas que quizás conozcas</b> </h2>
      <div class="col-12 mt-3">


        <div class="row">
        <table class="table " class="">
                        <thead>
                          <tr>
                            <th scope="col">nickname</th>
                            <th scope="col">nombres</th>
                            <th scope="col">apellidos</th>
                            <th scope="col">Acciones</th>

                          </tr>
                        </thead>
                        <tbody>


                          @foreach ($usuarios as $usuario)
                          <tr>
                            <td>{{$usuario->nickname}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->surnames}}</td>
                            <td>
                              <form action="/amigos/{{$usuario->id}}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn  btn-success">Enviar solicitud</button>


                              </form>



                            </td>




                          </tr>

                          @endforeach



                        </tbody>
                      </table>




        </div>
      </div>
      </p>


    </div>

  </div>

</div>




@endsection