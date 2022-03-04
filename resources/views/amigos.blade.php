@extends('layout.home')

@section('content')


<!-- /images/inicio.png -->

<div class="container">
  <div class="row">
    <div class="col-12 mt-3">
      <p style="text-align: center;">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
          Amigos
        </button>
      </p>
      <div class="row justify-content-center">
        <div class="col-6 " style="text-align: center;">
          <div style="min-height: 120px;" style="text-align: center;">
            <div class="collapse collapse-horizontal" id="collapseWidthExample" >
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
              <th scope="col">email</th>
            </tr>
          </thead>
          <tbody>


            @foreach ($usuarios as $usuario)
            <tr>
              <td>{{$usuario->nickname}}</td>
              <td>{{$usuario->nombres}}</td>
              <td>{{$usuario->apellidos}}</td>
              <td>{{$usuario->email}}</td>



            </tr>

            @endforeach



          </tbody>
        </table>



      </div>
    </div>
  </div>
</div>




@endsection