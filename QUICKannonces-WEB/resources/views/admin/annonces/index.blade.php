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
            <td>Date</td>
            <td></td>
          </tr>
        </thead>
        @foreach($annonces as $annonce)
        <tbody>
          <tr class="text-center">
            <td>
              <img src="{{ asset($annonce->images[0]->filename) }}" alt="Image" width="50">
            </td>
            <td>{{ $annonce->title }}</td>
            <td>{{ $annonce->price }}</td>
            <td>{{ $annonce->ville->nom_ville }}</td>
            <td>{{ $annonce->created_at }}</td>
            <td>

              <!-- Button to trigger the modal -->
              <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#confirmModal{{ $annonce->id }}">
                Valider
              </button>

              <!-- Modal -->
              <div class="modal fade" id="confirmModal{{ $annonce->id }}" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to validate this announcement?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <form action="{{ route('annonce.validAnnonce', $annonce->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Confirm</button>
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
    </div>
  </div>
</div>

@endsection