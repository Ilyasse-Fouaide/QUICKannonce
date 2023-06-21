<div style="border: 1px solid #052c65;" class="mb-3">
  <div class="blue-800" style="padding: 2px 20px;">
    <span class="text-light" style="font-weight: 500;">PANEL D'ADMINISTRATION</span>
  </div>

  <a href="{{ route('annonce.pendingAnnonce') }}">
    <div class="d-flex justify-content-center align-items-center bg-light p-2" style="gap: 20px">
      <div class="border d-flex flex-column justify-content-between align-items-center" style="width: 150px; height: 150px; background-color: #fff; border-radius: 10px; padding: 15px 0px">
        <div>@include('icons.validation des annonces-01-01')</div>
        <div class="text-center" style="font-size: smaller;">Validation des annonces</div>
      </div>
  </a>

  <a href="{{ route('ville.index') }}">
    <div class="border" style="width: 150px; height: 150px; background-color: #fff; border-radius: 10px">
      <div class="border d-flex flex-column justify-content-between align-items-center" style="width: 150px; height: 150px; background-color: #fff; border-radius: 10px; padding: 15px 0px">
        <div>@include('icons.gestion des villes-01-01')</div>
        <div class="text-center" style="font-size: smaller;">Gestion des villes</div>
      </div>
    </div>
  </a>

  <a href="{{ route('category.index') }}">
    <div class="border" style="width: 150px; height: 150px; background-color: #fff; border-radius: 10px">
      <div class="border d-flex flex-column justify-content-between align-items-center" style="width: 150px; height: 150px; background-color: #fff; border-radius: 10px; padding: 15px 0px">
        <div>@include('icons.gestion des categories-01')</div>
        <div class="text-center" style="font-size: smaller;">Gestion des categories</div>
      </div>
    </div>
  </a>

  <a href="{{ route('auth.index') }}">
    <div class="border" style="width: 150px; height: 150px; background-color: #fff; border-radius: 10px">
      <div class="border d-flex flex-column justify-content-between align-items-center" style="width: 150px; height: 150px; background-color: #fff; border-radius: 10px; padding: 15px 0px">
        <div>@include('icons.supprimer membre-01-01')</div>
        <div class="text-center" style="font-size: smaller;">Supprimer un membre</div>
      </div>
    </div>
  </a>

  <a href="{{ route('annonce.all') }}">
    <div class="border" style="width: 150px; height: 150px; background-color: #fff; border-radius: 10px">
      <div class="border d-flex flex-column justify-content-between align-items-center" style="width: 150px; height: 150px; background-color: #fff; border-radius: 10px; padding: 15px 0px">
        <div>@include('icons.supprimer membre-01-01')</div>
        <div class="text-center" style="font-size: smaller;">Supprimer un annonce</div>
      </div>
    </div>
  </a>

</div>

</div>