<nav class="navbar navbar-dark bg-dark navbar-expand-lg bg-light p-4" style="background-color: #213e35!important;">
  <div class="container container-fluid">
  <div class="logo" style="margin-right: 30px;"> <img src="/images/tree.jpeg" alt=""> </div>
      <a class="navbar-brand" href="/profile/{{ auth()->user()->id}}" >{{ auth()->user()->name}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/muro">Muro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/amigos">Amigos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/solicitud">Socitudes</a>
          </li>


 
        </ul>
        <form class="d-flex">
        <a href="{{ url('/logout') }}" type="submit" class="btn btn-danger nav-link" style="color: white;cursor:pointer">Cerrar sesion</a>
        </form>
      </div>
  </div>
</nav>