@extends('layout.home')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-12 mt-3">
      <p style="text-align: center;">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
          Solicitudes de amistad
        </button>
      <div class="col-12 mt-3">


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
              @foreach ($confirmarAmigos as $conf)
              <tr>
                <td>{{$conf->nickname}}</td>
                <td>{{$conf->name}}</td>
                <td>{{$conf->surnames}}</td>
                <td>
                  
                <form action="/solicitud/confirmarAmistad/{{$conf->id}}" method="POST">
                          {{csrf_field()}}
                          {{method_field('PUT')}}
                          <button type="submit" class="btn  btn-info">Confirmar amistad</button>

                        </form>

                </td>
                <td>
                  <form action="/solicitud/deleteConfirmar/{{$conf->id}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    <button type="submit" class="btn  btn-danger">Cancelar solicitud</button>
                  </form>
                </td>
              </tr>
              @endforeach



            </tbody>
          </table>



        </div>

        <div class="row">
          <div class="col-12 mt-3">
            <p style="text-align: center;">
              <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                Solicitudes Pendientes
              </button>
            <div class="col-12 mt-3">


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

                    @foreach ($pendienteAmigos as $pend)
                    <tr>
                      <td>{{$pend->nickname}}</td>
                      <td>{{$pend->name}}</td>
                      <td>{{$pend->surnames}}</td>
                      <td>

                        <button type="button" class="btn  btn-info">Pendiente de confirmar</button>






                      </td>
                      <td>

                   

                        <form action="/solicitud/deletePendiente/{{$pend->id}}" method="POST">
                          {{csrf_field()}}
                          {{method_field('delete')}}
                          <button type="submit" class="btn  btn-danger">Cancelar solicitud</button>
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
      </p>


    </div>

  </div>

</div>




@endsection