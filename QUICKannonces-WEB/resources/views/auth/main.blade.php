@extends('main')

@section('content')

<div class="row mt-5">

  <div class="col-3">
    <div class="mb-5">
      @include('auth.login')
    </div>
    <div>
      @include('layouts.user.sidebar')
    </div>
  </div>

  <div class="col">
    @include('auth.register')
  </div>

</div>

@endsection