<form action="{{ route('auth.register') }}" method="post">
  @csrf

  <div class="row mb-2">
    <div class="col-3">
      <label>Nom d'utilisateur</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" name="username" value="{{ old('username') }}">
      @error('username')
      <div class="text-danger" style="font-size: small;">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-3">
      <label>votre nom</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" name="nom" value="{{ old('nom') }}">
      @error('nom')
      <div class="text-danger" style="font-size: small;">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-3">
      <label>votre prenom</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}">
      @error('prenom')
      <div class="text-danger" style="font-size: small;">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-3">
      <label>votre email</label>
    </div>
    <div class="col">
      <input type="email" class="form-control" name="email" value="{{ old('email') }}">
      @error('email')
      <div class="text-danger" style="font-size: small;">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-3">
      <label>votre password</label>
    </div>
    <div class="col">
      <input type="password" class="form-control" name="password" value="{{ old('password') }}">
      @error('password')
      <div class="text-danger" style="font-size: small;">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-3">
      <label>comfirm password</label>
    </div>
    <div class="col">
      <input type="password" class="form-control" name="comfirm_password" value="{{ old('comfirm_password') }}">
      @error('comfirm_password')
      <div class="text-danger" style="font-size: small;">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-3">
      <label>votre telephone</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" name="telephone" value="{{ old('telephone') }}">
      @error('telephone')
      <div class="text-danger" style="font-size: small;">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-3">
      <label>votre genre</label>
    </div>
    <div class="col">
      <select name="gender" class="form-control" value="{{ old('gender') }}">
        <option selected disabled hidden>-- Sélectionner le genre --</option>
        <option value="homme">Homme</option>
        <option value="femme">femme</option>
      </select>
      @error('gender')
      <div class="text-danger" style="font-size: small;">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
      <button type="submit" class="btn btn-primary form-control">Register</button>
    </div>
  </div>
</form>