@extends('main')

@section('content')

<div class="row">
  <div class="col-3">
    <div>
      <p>Bienvenu {{ auth()->user()->username }}</p>
      <form action="{{ route('auth.logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Deconexion</button>
      </form>
    </div>
    <div>
      @if (auth()->user()->role === "admin")
      @include('layouts.admin.sidebar')
      @elseif (auth()->user()->role === "user")
      @include('layouts.user.sidebar')
      @endif
    </div>
  </div>
  <div class="col-7">
    <form action="{{ route('annonce.store') }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="row mb-2">
        <div class="col-3">
          <label>Votre nom</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="nom" value="{{ auth()->user()->nom }}" readonly>
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>E-mail</label>
        </div>
        <div class="col">
          <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" readonly>
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>Tel</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="telephone" value="{{ auth()->user()->telephone }}" readonly>
        </div>
      </div>

      <div class="row mb-2" style="display: none;">
        <div class="col-3">
          <label>User</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="user" value="{{ auth()->user()->id }}" readonly>
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>Categorie</label>
        </div>
        <div class="col">
          <select name="category" class="form-select">
            <option selected disabled hidden>-- Sélectionner le categorie --</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->nom_category }}</option>
            @endforeach
          </select>
          @error('category')
          <div class="text-danger" style="font-size: small;">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>Ville</label>
        </div>
        <div class="col">
          <select name="ville" class="form-select">
            <option selected disabled hidden>-- Sélectionner le ville --</option>
            @foreach ($villes as $ville)
            <option value="{{ $ville->id }}">{{ $ville->nom_ville }}</option>
            @endforeach
          </select>
          @error('ville')
          <div class="text-danger" style="font-size: small;">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>Title</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="title">
          @error('title')
          <div class="text-danger" style="font-size: small;">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>Description de l'annonce</label>
        </div>
        <div class="col">
          <textarea class="form-control" name="description" cols="30" rows="5"></textarea>
          @error('description')
          <div class="text-danger" style="font-size: small;">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>Price</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="price">
          @error('price')
          <div class="text-danger" style="font-size: small;">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>Photos</label>
        </div>
        <div class="col">
          <input type="file" name="image01" class="form-control mb-1">
          <input type="file" name="image02" class="form-control mb-1">
          <input type="file" name="image03" class="form-control mb-1">
          <input type="file" name="image04" class="form-control mb-1">
          <input type="file" name="image05" class="form-control">
        </div>
      </div>

      <div class="row mb-2">
        <div class="col">
          <button type="submit" class="btn btn-primary">Publier</button>
        </div>
      </div>

    </form>
  </div>
</div>

@endsection