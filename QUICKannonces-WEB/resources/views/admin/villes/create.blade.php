@extends('main')

@section('content')

<div class="row mb-2">
  <div>
    <a href="#">Mes Annonces</a>
  </div>
</div>

<div class="row">

  <div class="col-3">
    <div>
      @include('layouts.admin.sidebar')
    </div>
  </div>

  <div class="col">
    @include('admin.panel')
    <form action="{{ route('ville.store') }}" method="post">
      @csrf

      <div class="row mb-2">
        <div class="col">
          <input type="text" class="form-control" name="nom_ville">
          @error('nom_ville')
          <div class="text-danger" style="font-size: small;">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="col">
          <button type="submit" class="btn btn-primary form-control">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection