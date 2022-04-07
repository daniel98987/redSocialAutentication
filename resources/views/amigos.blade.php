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
  <div class="row">
    <div class="col-12 mt-3">
      <p style="text-align: center;">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
          Lista Amigos
        </button>
      <div class="col-12 mt-3">

        <div class="row justify-content-center">
          <div class="col-6 " style="text-align: center;">
            <div style="min-height: 120px;" style="text-align: center;">
              <div class="collapse collapse-horizontal" id="collapseWidthExample">
                <div class="card card-body" style="width: 430px;">
                  Lista de amigos usuario Armando Portilla
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
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
      </div>
      </p>


    </div>
    <div class="col-12 mt-3">
      <p style="text-align: center;">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
          Personas que quizas conozcas
        </button>
      </p>
      <div class="row justify-content-center">
        <div class="col-6 " style="text-align: center;">
          <div style="min-height: 120px;" style="text-align: center;">
            <div class="collapse collapse-horizontal" id="collapseWidthExample">
              <div class="card card-body" style="width: 430px;">
                Lista de amigos usuario Armando Portilla
              </div>
            </div>
          </div>
        </div>
      </div>
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
                  <button type="submit" class="btn  btn-info">Enviar solicitud</button>


                </form>



              </td>




            </tr>

            @endforeach



          </tbody>
        </table>



      </div>
    </div>
  </div>
</div>




@endsection