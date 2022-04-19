<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="{{ url('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/personal/app.css') }}" rel="stylesheet">

    <title>redSocial</title>
</head>

<body>


    <section class="bg-dark">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col">
                    <div class="card card-registration">
                        <div class="row" style="display: flex;flex-direction: row;justify-content: center;align-items: center;">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="/images/register.jpg" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;height: 100vh;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <div class="logo"> <img src="/images/tree.jpeg" alt=""> </div>
                                    <div style="font-size: 30px;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;margin-bottom: 20px;" class="text-center mt-4 name">REGISTRO <span style="color: #52a98c;">E</span><span style="color: #16463D;">C</span><span style="color: #33DABA;">O</span><span style="color: #16463D;">-RED NARIÑO </span> </div>

                                    <form action="" method="POST">
                                          @csrf
                                        <div class=" mb-4">
                                            <label class="form-label" for="nickname">Nickname</label>
                                            <input type="text" id="nickname" name="nickname" class="form-control form-control-lg" />
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" for="name">Nombres</label>
                                                    <input type="text" id="name" name="name" class="form-control form-control-lg" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" for="surnames">Apellidos</label>
                                                    <input type="text" id="surnames" name="surnames" class="form-control form-control-lg" />
                                                </div>
                                            </div>


                                        </div>




                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Email </label>
                                            <input type="text" id="email" name="email" class="form-control form-control-lg" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Contraseña</label>
                                            <input type="password" id="password"   name="password" class="form-control form-control-lg" />
                                        </div>

                                        <div class="d-flex justify-content-end pt-3">
                                            
                                            <button type="submit" class="btn btn-warning btn-lg ms-2">Registrarse</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>

</body>

</html>