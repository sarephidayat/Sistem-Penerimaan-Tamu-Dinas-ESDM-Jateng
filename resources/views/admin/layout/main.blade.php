<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
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

    {{-- Footer / Bottom --}}
    @include('admin/layout._bottom')
</body>
</html>
