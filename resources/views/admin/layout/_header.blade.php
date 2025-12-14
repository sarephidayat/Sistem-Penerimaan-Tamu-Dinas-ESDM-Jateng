<div class="navbar-bg"></div>

<nav class="navbar navbar-expand-lg main-navbar bg-gradient-primary">

  {{-- LEFT --}}
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li>
        <a href="#" data-toggle="sidebar"
           class="nav-link nav-link-lg text-white">
          <i class="fas fa-bars"></i>
        </a>
      </li>
    </ul>
  </form>

  {{-- RIGHT --}}
  <ul class="navbar-nav navbar-right">

    <li class="dropdown">
      <a href="#" data-toggle="dropdown"
         class="nav-link dropdown-toggle nav-link-lg nav-link-user text-white">

        <img
          src="{{ asset('img/avatar/avatar-1.png') }}"
          class="rounded-circle mr-2"
          width="35"
          alt="avatar">

        <div class="d-none d-lg-inline-block">
          {{ session('login')->username }}
        </div>
      </a>

      <div class="dropdown-menu dropdown-menu-right shadow-sm">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit"
                  class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </button>
        </form>
      </div>
    </li>

  </ul>
</nav>
