<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ url('/dashboard') }}">
        <img src="{{ asset('img/logo.png') }}" alt="logo" width="150">
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ url('/dashboard') }}">EF</a>
    </div>

    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li>
        <a class="nav-link" href="{{ url('/dashboard') }}">
          <i class="fas fa-fire"></i> <span>Home</span>
        </a>
      </li>

      <li class="menu-header">Main Feature</li>

      <!-- Menu Dosen -->
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="fas fa-columns"></i> <span>Dosen</span>
        </a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ url('/dosen') }}">List</a></li>
          <li><a class="nav-link" href="{{ url('/dosen/create') }}">Tambah Data</a></li>
        </ul>
      </li>

      <!-- Menu User -->
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="fas fa-users"></i> <span>User</span>
        </a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ url('/user') }}">List</a></li>
          <li><a class="nav-link" href="{{ url('/user/create') }}">Tambah Data</a></li>
        </ul>
      </li>           

    </ul>
  </aside>
</div>
