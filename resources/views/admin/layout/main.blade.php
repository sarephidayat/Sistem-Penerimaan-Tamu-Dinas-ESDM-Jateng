<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    {{-- CSS tambahan per halaman --}}
    @stack('styles')
</head>
<body>

    {{-- Header --}}
    @include('admin/layout._header')

    <div class="wrapper">
        {{-- Sidebar --}}
        @include('admin/layout._sidenav')

        <div class="content">
            {{-- Top bar --}}
            @include('admin/layout._top')

            

        </div>
    </div>

    {{-- ===================== --}}
    {{-- MODAL (WAJIB DI SINI) --}}
    {{-- ===================== --}}
    @stack('modals')

    {{-- Footer / Bottom (JS) --}}
    @include('admin/layout._bottom')

    {{-- 🔥 SCRIPT PER HALAMAN --}}
    @yield('scripts')

</body>
</html>
