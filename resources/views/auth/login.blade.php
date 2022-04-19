<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="{{ url('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/personal/app.css') }}" rel="stylesheet">

    <title>Videoclub</title>
</head>

<body class="login">

    <img src="/images/fondo.png" alt="" class="arbol">

    
    <div class="wrapper">

        <div class="logo"> <img src="/images/tree.jpeg" alt=""> </div>
        <div style="font-size: 30px;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;" class="text-center mt-4 name"> <span style="color: #52a98c;">E</span><span style="color: #16463D;">C</span><span style="color: #33DABA;">O</span><span style="color: #16463D;">-RED NARIÑO </span> </div>
        <form class="p-3 mt-3" method="POST" action="/login">

            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input value="daniel@gmail.com" type="email" name="email" id="email" placeholder="email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" value="hola" name="password" id="pwd" placeholder="Password">
            </div>
            <p class=""></p>
            <button type="submit" class="btn btn-success mt-3">Iniciar sesión</button>
            <div style="display: flex;justify-content:center;align-items: center;gap:10px;margin-top:20px;">
                ¿Aún no tienes cuenta?
                <a href="/register" style="color: blue;">Registrate</a>
            </div>
        </form>

    </div>
    <script src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>

</body>

</html>