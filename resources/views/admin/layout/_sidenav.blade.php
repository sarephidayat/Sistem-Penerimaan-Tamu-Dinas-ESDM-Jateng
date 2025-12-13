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

      <!-- Menu Checkin -->
      <li>
        <a href="{{ url('/checkin') }}" class="nav-link">
          <i class="fas fa-columns"></i> <span>Check-In</span>
        </a>
      </li>

      <!-- Menu Checkout -->
      <li>
        <a href="{{ url('/checkout') }}" class="nav-link">
          <i class="fas fa-users"></i> <span>Check-Out</span>
        </a>
      </li>
      <!-- Menu Statistik -->
      <li>
        <a href="{{ url('/statistik') }}" class="nav-link">
          <i class="fas fa-users"></i> <span>Statistik</span>
        </a>
      </li>

      <li class="menu-header">Main Feature</li>
      <li>
        <a href="{{ url('/profile') }}" class="nav-link">
          <i class="fas fa-users"></i> <span>Profile</span>
        </a>
      </li>
         

    </ul>
  </aside>
</div>
