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
  </style>
</head>

<body>

  <div class="container">

    @auth
    @if (auth()->user()->role === "user")
    <div class="d-flex justify-content-between align-items-center text-light blue-800" style="padding: 3px 18px;">
      <div class="col-8">Panel Membre</div>
      <div class="col" style="text-align: right;">
        <a href="#">Welome {{ auth()->user()->username }}</a>
      </div>
      <div class="col" style="text-align: right;">
        <form action="{{ route('auth.logout') }}" method="post">
          @csrf
          <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
      </div>
    </div>
    @elseif (auth()->user()->role === "admin")
    <div class="d-flex justify-content-between align-items-center text-light blue-800" style="padding: 3px 18px;">
      <div class="col-8">Panel admin</div>
      <div class="col" style="text-align: right;">
        <a href="#">Welome Mr.{{ auth()->user()->username }}</a>
      </div>
      <div class="col" style="text-align: right;">
        <form action="{{ route('auth.logout') }}" method="post">
          @csrf
          <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
      </div>
    </div>
    @endif
    @else
    <div class="d-flex justify-content-between align-items-center text-light blue-800" style="padding: 3px 18px;">
      <div class="col-8">
        <strong>Nouveau ! </strong>
        <span>Creez un compte aujourd'hui pour deposer votre annonce gratuit!</span>
      </div>
      <div class="col" style="text-align: right;">
        <a href="{{ route('auth.showRegisterForm') }}">Creer un compte</a>
      </div>
      <div class="col" style="text-align: right;">
        <a href="{{ route('auth.showLoginForm') }}">Se connecter</a>
      </div>
    </div>
    @endauth

    <div class="d-flex justify-content-between align-items-center mt-4" style="gap: 50px">
      <div>
        <!-- // ! LOGO -->
        @include('icons.quick annonces-01-01')
      </div>
      <div class="input-group mb-3">
        <input type="text" class="form-control" />
        <span class="input-group-text" style="background-color: #cfe2ff;">Rechercher</span>
      </div>
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

    <div class="mt-5" style="margin-bottom: 250px;">
      @yield('content')
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>