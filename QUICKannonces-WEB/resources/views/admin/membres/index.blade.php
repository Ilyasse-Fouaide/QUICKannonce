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
              <form action="{{ route('auth.destroy', $user->id) }}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
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