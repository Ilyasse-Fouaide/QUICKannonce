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
    <div>
      <table class="table">
        <thead>
          <tr class="text-center">
            <td>ID</td>
            <td>Ville</td>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>{{ $ville->id }}</td>
            <td>{{ $ville->nom_ville }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection