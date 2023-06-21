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
      <input type="text" class="form-control" name="usernamel" value="{{ session('username') }}">
      @error('usernamel')
      <div class="text-danger" style="font-size: small;">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
      <input type="password" class="form-control" name="passwordl">
      @error('passwordl')
      <div class="text-danger" style="font-size: small;">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="row">
    <div class="col">
      <button type="submit" class="btn btn-primary form-control">Login</button>
    </div>
  </div>
</form>