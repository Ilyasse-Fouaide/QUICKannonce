@extends('main')

@section('content')

<div class="row mt-5">

  <div class="col-3">
    <div class="">
      @include('auth.login')
    </div>
    <hr>
    <div>
      @include('layouts.user.sidebar')
    </div>
  </div>

  <div class=" col-6">
    @include('auth.register')
  </div>

</div>

@endsection