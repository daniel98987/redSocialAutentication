<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="{{ url('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/personal/app.css') }}" rel="stylesheet">

    <title>Videoclub</title>
</head>

<body>



    <div class="wrapper">

        <div class="logo"> <img src="https://e7.pngegg.com/pngimages/491/932/png-clipart-social-media-marketing-facebook-telegram-social-network-letter-b-blue-text.png" alt=""> </div>
        <div class="text-center mt-4 name"> Red social app </div>
        <form class="p-3 mt-3" method="POST" action="/login">

            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input value="dzambrano863@gmail.com" type="email" name="email" id="email" placeholder="email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <p class=""></p>
            <button type="submit" class="btn mt-3">Login</button>
        </form>

    </div>
    <script src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>

</body>

</html>