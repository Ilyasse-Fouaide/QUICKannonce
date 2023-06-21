<form action="{{ route('auth.login') }}" method="post">
  @csrf

  @if (session('message'))
  <div class="alert alert-success">
    {{ session('message') }}
  </div>
  @endif

  @if (session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
  @endif

  <div class="row mb-2">
    <div class="col">
      <input type="text" class="form-control" placeholder="votre nom d'utilisateur..." name="usernamel" value="{{ session('username') }}">
      @error('usernamel')
      <div class="text-danger" style="font-size: small;">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
      <input type="password" class="form-control" placeholder="votre mot de passe..." name="passwordl">
      @error('passwordl')
      <div class="text-danger" style="font-size: small;">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="d-flex justify-content-end">
    <div class="col-5">
      <button type="submit" class="btn btn-outline-primary form-control">Login</button>
    </div>
  </div>
</form>