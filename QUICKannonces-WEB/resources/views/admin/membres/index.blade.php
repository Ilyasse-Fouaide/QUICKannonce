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
            <td>User</td>
            <td></td>
          </tr>
        </thead>
        @foreach($users as $user)
        <tbody>
          <tr class="text-center">
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td>
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
                      Are you sure you want to delete this Annonce?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <form action="{{ route('auth.destroy', $user->id) }}" method="post" style="display: inline;">
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
      {{ $users->links() }}
    </div>
  </div>
</div>

@endsection