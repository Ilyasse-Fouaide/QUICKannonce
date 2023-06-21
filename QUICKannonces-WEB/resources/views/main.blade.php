<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>QUICKannonce</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    * {
      /* border: 1px solid red; */
      box-sizing: border-box;
    }

    .blue-800 {
      background-color: #052c65;
    }

    a {
      text-decoration: none;
    }

    body {
      padding: 0;
      margin: 0;
    }

    #notfound {
      position: relative;
      height: 60vh;
    }

    #notfound .notfound {
      position: absolute;
      left: 50%;
      top: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    .notfound {
      max-width: 520px;
      width: 100%;
      line-height: 1.4;
      text-align: center;
    }

    .notfound .notfound-404 {
      position: relative;
      height: 240px;
    }

    .notfound .notfound-404 h1 {
      font-family: 'Montserrat', sans-serif;
      position: absolute;
      left: 50%;
      top: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      font-size: 252px;
      font-weight: 900;
      margin: 0px;
      color: #262626;
      text-transform: uppercase;
      letter-spacing: -40px;
      margin-left: -20px;
    }

    .notfound .notfound-404 h1>span {
      text-shadow: -8px 0px 0px #fff;
    }

    .notfound .notfound-404 h3 {
      font-family: 'Cabin', sans-serif;
      position: relative;
      font-size: 16px;
      font-weight: 700;
      text-transform: uppercase;
      color: #262626;
      margin: 0px;
      letter-spacing: 3px;
      padding-left: 6px;
    }

    .notfound h2 {
      font-family: 'Cabin', sans-serif;
      font-size: 20px;
      font-weight: 400;
      text-transform: uppercase;
      color: #000;
      margin-top: 0px;
      margin-bottom: 25px;
    }

    @media only screen and (max-width: 767px) {
      .notfound .notfound-404 {
        height: 200px;
      }

      .notfound .notfound-404 h1 {
        font-size: 200px;
      }
    }

    @media only screen and (max-width: 480px) {
      .notfound .notfound-404 {
        height: 162px;
      }

      .notfound .notfound-404 h1 {
        font-size: 162px;
        height: 150px;
        line-height: 162px;
      }

      .notfound h2 {
        font-size: 16px;
      }
    }
  </style>
</head>

<body>

  <div style="width: 80%; margin: auto;">

    @auth
    @if (auth()->user()->role === "user")
    <div class="d-flex justify-content-between align-items-center text-light blue-800" style="padding: 2px 18px;">
      <div class="col-8" style="text-decoration: underline;">Panel Membre</div>
      <div class="col" style="text-align: right;">
        <a href="{{ route('auth.profile') }}" class="text-light" style="text-decoration: underline;">Welome {{ auth()->user()->username }}</a>
      </div>
      <div class="col" style="text-align: right;">
        <form action="{{ route('auth.logout') }}" method="post">
          @csrf
          <button type="submit" class="btn text-light" style="text-decoration: underline;">Deconexion</button>
        </form>
      </div>
    </div>
    @elseif (auth()->user()->role === "admin")
    <div class="d-flex justify-content-between align-items-center text-light blue-800" style="padding: 2px 18px;">
      <div class="col-8" style="text-decoration: underline;">Panel admin</div>
      <div class="col" style="text-align: right;">
        <a href="{{ route('auth.profile') }}" class="text-light" style="text-decoration: underline;">Welome Mr.{{ auth()->user()->username }}</a>
      </div>
      <div class="col" style="text-align: right;">
        <form action="{{ route('auth.logout') }}" method="post">
          @csrf
          <button type="submit" class="btn text-light" style="text-decoration: underline;">Deconexion</button>
        </form>
      </div>
    </div>
    @endif
    @else
    <div class="d-flex justify-content-between align-items-center text-light blue-800" style="padding: 2px 18px;">
      <div class="col-8" style="text-decoration: underline;">
        <strong>Nouveau ! </strong>
        <span>Creez un compte aujourd'hui pour deposer votre annonce gratuit!</span>
      </div>
      <div class="col" style="text-align: right;">
        <a href="{{ route('auth.showRegisterForm') }}" class="text-light" style="text-decoration: underline;">Creer un compte</a>
      </div>
      <div class="col" style="text-align: right;">
        <a href="{{ route('auth.showLoginForm') }}" class="text-light" style="text-decoration: underline;">Se connecter</a>
      </div>
    </div>
    @endauth

    <div class="d-flex justify-content-between align-items-center mt-4" style="gap: 50px">
      <div>
        <!-- // ! LOGO -->
        @include('icons.quick annonces-01-01')
      </div>
      <form action="{{ route('annonce.index') }}" method="GET" class="input-group mb-3">
        @csrf
        <input type="text" class="form-control" placeholder="Que recherchez-vouz?" name="search" value="{{ request()->search }}" />
        <button type="submit" class="input-group-text" style="background-color: #cfe2ff;">Rechercher</button>
      </form>
      <div>
        <a href="{{ route('annonce.create') }}">
          <!-- // ! LOGO -->
          @include('icons.my second word(for ilyasse)-01-01')
        </a>
      </div>
    </div>

    <div class="d-flex justify-content-between text-center mt-4">
      <a href="{{ route('annonce.index') }}" class="blue-800 form-control" style="border-radius: 10px 0px 0px 0px; color: #fff;">Acceuil</a>
      <a href="#" class="blue-800 form-control" style="border-radius: 0; color: #fff">Immobilise</a>
      <a href="#" class="blue-800 form-control" style="border-radius: 0; color: #fff">Multimedia</a>
      <a href="#" class="blue-800 form-control" style="border-radius: 0; color: #fff">Maison</a>
      <a href="#" class="blue-800 form-control" style="border-radius: 0; color: #fff">Vehicules</a>
      <a href="#" class="blue-800 form-control" style="border-radius: 0; color: #fff">Emploie et Services</a>
      <a href="#" class="blue-800 form-control" style="border-radius: 0px 10px 3px 0px; color: #fff;">Objets Personnels</a>
    </div>

    <div class="mt-2" style="margin-bottom: 250px;">
      @yield('content')
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>