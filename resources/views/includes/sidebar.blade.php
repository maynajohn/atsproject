<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
      <img src="../assets/img/logo-ct-dark.png" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Projet ATS</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">

  <div class="w-auto d-flex flex-column justify-content-between h-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <!-- Section principale -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
          <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Tableau de bord</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('candidature.*') ? 'active' : '' }}" href="{{ route('candidature.index') }}">
          <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-send text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Mes candidatures</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('convocation.*') ? 'active' : '' }}" href="{{ route('convocation.index') }}">
          <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-time-alarm text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Mes convocations</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('offre.*') ? 'active' : '' }}" href="{{ route('offre.publie') }}">
          <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-briefcase-24 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Offres d'emploi</span>
        </a>
      </li>

      <!-- Section utilisateur -->
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Compte</h6>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}" href="{{ route('user.index') }}">
          <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-circle-08 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Profil</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">
          <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-fat-add text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">S'enregistrer</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
