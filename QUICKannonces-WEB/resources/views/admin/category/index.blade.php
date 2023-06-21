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
            <td>Category</td>
          </tr>
        </thead>
        @foreach($category as $cat)
        <tbody>
          <tr class="text-center">
            <td>{{ $cat->id }}</td>
            <td>{{ $cat->nom_category }}</td>
            <td>
              <a href="{{ route('category.show', $cat->id) }}">
                <button class="btn btn-info">Show</button>
              </a>
              <a href="{{ route('category.edit', $cat->id) }}">
                <button class="btn btn-success">Edit</button>
              </a>
              <form action="{{ route('category.destroy', $cat->id) }}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
      {{ $category->links() }}
    </div>
  </div>
</div>

@endsection