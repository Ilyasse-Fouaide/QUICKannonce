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
            <td>ID</td>
            <td>Ville</td>
            <td></td>
          </tr>
        </thead>
        @foreach($villes as $ville)
        <tbody>
          <tr class="text-center">
            <td>{{ $ville->id }}</td>
            <td>{{ $ville->nom_ville }}</td>
            <td>
              <a href="{{ route('ville.show', $ville->id) }}">
                <button class="btn btn-info">Show</button>
              </a>
              <a href="{{ route('ville.edit', $ville->id) }}">
                <button class="btn btn-success">Edit</button>
              </a>
              <form action="{{ route('ville.destroy', $ville->id) }}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
      {{ $villes->links() }}
    </div>
  </div>
</div>

@endsection