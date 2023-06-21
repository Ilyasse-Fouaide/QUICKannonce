@extends('main')

@section('content')

<div class="row mb-2">
  @auth
  <div>
    <a href="#">Mes Annonces</a>
  </div>
  @endauth
</div>

<div class="row">

  <div class="col-3">
    <div>
      @auth
      @if (auth()->user()->role === "admin")
      @include('layouts.admin.sidebar')
      @elseif (auth()->user()->role === "user")
      @include('layouts.user.sidebar')
      @endif
      @else
      @include('layouts.user.sidebar')
      @endauth
    </div>
  </div>

  <div class="col">
    @auth
    @if (auth()->user()->role === "admin")
    @include('admin.panel')
    @endif
    @endauth

    <div>
      <div class="mb-3">
        <label for="username" class="form-label">Nom d'utilisateur</label>
        <input type="text" readonly class="form-control" id="username" name="username" value="{{ auth()->user()->username }}" required>
      </div>

      <div class="row mb-3">
        <div class="col">
          <label for="nom" class="form-label">Prenom</label>
          <input type="text" readonly class="form-control" id="nom" name="nom" value="{{ auth()->user()->nom }}" required>
        </div>
        <div class="col">
          <label for="prenom" class="form-label">Nom</label>
          <input type="text" readonly class="form-control" id="prenom" name="prenom" value="{{ auth()->user()->prenom }}" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" readonly class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
      </div>

      <div class="mb-3">
        <label for="telephone" class="form-label">Telephone</label>
        <input type="tel" readonly class="form-control" id="telephone" name="telephone" value="{{ auth()->user()->telephone }}" required>
      </div>

      <div class="mb-3">
        <label for="gender" class="form-label">Genre</label>
        <select class="form-select" id="gender" name="gender" required>
          <option value="homme" disabled {{ auth()->user()->gender === 'homme' ? 'selected' : '' }}>homme</option>
          <option value="femme" disabled {{ auth()->user()->gender === 'femme' ? 'selected' : '' }}>femme</option>
        </select>
      </div>

    </div>
  </div>
</div>

@endsection