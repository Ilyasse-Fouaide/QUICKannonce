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
    @if (session('info'))
    <div class="alert alert-info">{{ session('info') }}</div>
    @endif
    <hr>
    <form action="{{ route('annonce.index') }}" method="get">
      @csrf
      <div class="row align-items-center">
        <!-- Category Filter -->
        <div class="col form-group">
          <select name="category" id="category" class="form-control">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
            <option value="{{ $category->nom_category }}" {{ $category->nom_category === request()->input('category') ? 'selected' : '' }}>
              {{ $category->nom_category }}
            </option>
            @endforeach
          </select>
        </div>

        <!-- Ville Filter -->
        <div class="col form-group">
          <select name="ville" id="ville" class="form-control">
            <option value="">All Cities</option>
            @foreach ($villes as $ville)
            <option value="{{ $ville->nom_ville }}" {{ $ville->nom_ville === request()->input('ville') ? 'selected' : '' }}>
              {{ $ville->nom_ville }}
            </option>
            @endforeach
          </select>
        </div>

        <!-- Order By -->
        <div class="col form-group">
          <select name="sort_by" id="sort_by" class="form-control">
            <option value="" hidden>Sort By</option>
            <option value="price">Price</option>
            <option value="title">Title</option>
          </select>
        </div>

        <!-- Submit Button -->
        <div class="col form-group">
          <button type="submit" class="btn btn-primary">Apply Filters</button>
        </div>

      </div>
      <input type="hidden" name="page" value="{{ $annonces->currentPage() }}">
    </form>
    <hr>
    <div>
      <table class="table">
        <thead>
          <tr class="text-center">
            <td>Images</td>
            <td>Titre</td>
            <td>Prix</td>
            <td>Ville</td>
            <td>Category</td>
            <td>Date</td>
          </tr>
        </thead>
        <tbody>
          @foreach($annonces as $annonce)
          <tr class="text-center">
            <td>
              <img src="{{ asset($annonce->images[0]->filename) }}" alt="Image" width="50">
            </td>
            <td>{{ $annonce->title }}</td>
            <td>{{ $annonce->price }}</td>
            <td>{{ $annonce->ville->nom_ville }}</td>
            <td>{{ $annonce->category->nom_category }}</td>
            <td>{{ $annonce->created_at }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $annonces->links() }}
    </div>
  </div>
</div>

@endsection