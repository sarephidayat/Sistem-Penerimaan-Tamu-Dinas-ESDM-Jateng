<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>@yield('title', 'Dashboard') &mdash; DINAS ESDM JAWA TENGAH 2025</title>

  {{-- ======================
     GENERAL CSS (STISLA)
  ====================== --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  {{-- ======================
     CSS LIBRARIES
  ====================== --}}
  <link rel="stylesheet" href="{{ asset('modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('modules/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('modules/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('modules/izitoast/css/iziToast.min.css') }}">

  {{-- ======================
     TEMPLATE CSS
  ====================== --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/components.css') }}">

  {{-- ======================
     CUSTOM / MODERN UI
  ====================== --}}
  <link rel="stylesheet" href="{{ asset('css/admin-modern.css') }}">

  @stack('styles')
</head>

<body>
<div id="app">
  <div class="main-wrapper main-wrapper-1">

    {{-- HEADER --}}
    @include('admin.layout._header')

    {{-- SIDEBAR --}}
    @include('admin.layout._sidenav')

    {{-- MAIN CONTENT --}}
    <div class="main-content">
      <section class="section">
        @yield('content')
      </section>
    </div>

    {{-- FOOTER + JS --}}
    @include('admin.layout._bottom')

  </div>
</div>

@stack('scripts')
</body>
</html>
