@extends('main')

@section('content')

<div class="row">

  <div class="col-3">
    <div>
      <a href="#">Mes Annonces</a>
    </div>
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
            <td>Images</td>
            <td>Titre</td>
            <td>Prix</td>
            <td>Ville</td>
            <td></td>
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
            <td>
              <form action="{{ route('delete-annonce', $annonce->id) }}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $annonces->links() }}
    </div>
  </div>
</div>

@endsection