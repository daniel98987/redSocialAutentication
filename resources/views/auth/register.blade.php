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


    <section class="h-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6" style="margin-top: 150px;">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-5 text-uppercase">Registro usuario - red social app</h3>

                                    <form action="" method="POST">
                                          @csrf
                                        <div class=" mb-4">
                                            <input type="text" id="nickname" name="nickname" class="form-control form-control-lg" />
                                            <label class="form-label" for="nickname">Nickname</label>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="name" name="name" class="form-control form-control-lg" />
                                                    <label class="form-label" for="name">Nombres</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="surnames" name="surnames" class="form-control form-control-lg" />
                                                    <label class="form-label" for="surnames">Apellidos</label>
                                                </div>
                                            </div>


                                        </div>




                                        <div class="form-outline mb-4">
                                            <input type="text" id="email" name="email" class="form-control form-control-lg" />
                                            <label class="form-label" for="email">Email </label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="password"   name="password" class="form-control form-control-lg" />
                                            <label class="form-label" for="password">Contraseña</label>
                                        </div>

                                        <div class="d-flex justify-content-end pt-3">
                                            
                                            <button type="submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
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