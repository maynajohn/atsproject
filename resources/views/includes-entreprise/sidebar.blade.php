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
      <!-- Tableau de bord -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-chart-bar-32 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Tableau de bord</span>
        </a>
      </li>

      <!-- Profil entreprise -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('entreprise.edit') ? 'active' : '' }}" href="{{ route('entreprise.edit', Auth::user()->entreprise->id ?? 1) }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-building text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Profil entreprise</span>
        </a>
      </li>

      <!-- Mes offres -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('offre.index') ? 'active' : '' }}" href="{{ route('offre.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-briefcase-24 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Mes offres d'emploi</span>
        </a>
      </li>

      <!-- Créer une offre -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('offre.create') ? 'active' : '' }}" href="{{ route('offre.create') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-fat-add text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Créer une offre</span>
        </a>
      </li>

        <!-- Candidatures reçues (par entreprise) -->
        <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('candidature-entreprise.index') ? 'active' : '' }}" 
            href="{{ route('candidature-entreprise.index', ['entreprise' => Auth::user()->entreprise_id ?? 1]) }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-copy-04 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Candidatures reçues</span>
        </a>
        </li>


      <!-- Convocations envoyées -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('convocation.index') ? 'active' : '' }}" href="{{ route('convocation.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-time-alarm text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Convocations envoyées</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
