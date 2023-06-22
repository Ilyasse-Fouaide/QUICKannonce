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
      @if (session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
      @endif
      <div>
        <a href="{{ route('ville.create') }}" class="text-primary">Add Ville</a>
      </div>
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
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">Delete</button>

              <!-- Modal -->
              <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to delete this Ville?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <form action="{{ route('ville.destroy', $ville->id) }}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
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