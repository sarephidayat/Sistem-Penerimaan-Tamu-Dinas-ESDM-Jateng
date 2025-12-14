<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">

    {{-- LOGO --}}
    <div class="sidebar-brand">
      <a href="{{ url('/dashboard') }}" class="d-flex align-items-center">
        <img src="{{ asset('img/logo.png') }}" width="120">
      </a>
    </div>

    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ url('/dashboard') }}">ESDM</a>
    </div>

    {{-- MENU --}}
    <ul class="sidebar-menu">

      <li class="menu-header">Dashboard</li>
      <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/dashboard') }}">
          <i class="fas fa-home"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="menu-header">Main Feature</li>

      <li class="{{ request()->is('checkin*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/checkin') }}">
          <i class="fas fa-sign-in-alt"></i>
          <span>Check-In</span>
        </a>
      </li>

      <li class="{{ request()->is('checkout*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/checkout') }}">
          <i class="fas fa-sign-out-alt"></i>
          <span>Check-Out</span>
        </a>
      </li>

      <li class="{{ request()->is('pemesanan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/pemesanan') }}">
          <i class="fas fa-calendar-check"></i>
          <span>Booking</span>
        </a>
      </li>

      <li class="{{ request()->is('statistik*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/statistik') }}">
          <i class="fas fa-chart-bar"></i>
          <span>Statistik</span>
        </a>
      </li>

      <li class="menu-header">Account</li>

      <li class="{{ request()->is('profile*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/profile') }}">
          <i class="fas fa-user"></i>
          <span>Profile</span>
        </a>
      </li>

    </ul>
  </aside>
</div>
