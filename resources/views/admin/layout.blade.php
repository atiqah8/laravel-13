<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title', 'Admin') - Portofolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets-admin/img/favicon/favicon-32x32.png') }}">
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="{{ route('cv') }}">
            <img class="navbar-brand-dark" src="{{ asset('assets-admin/img/brand/light.svg') }}" alt="Logo" />
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse">
        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item">
                    <a href="{{ route('cv') }}" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon">
                            <img src="{{ asset('assets-admin/img/brand/light.svg') }}" height="20" width="20" alt="Logo">
                        </span>
                        <span class="mt-1 ms-1 sidebar-text">Lihat CV</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('portofolio.*') ? 'active' : '' }}">
                    <a href="{{ route('portofolio.index') }}" class="nav-link">
                        <span class="sidebar-text">Portofolio</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('skill.*') ? 'active' : '' }}">
                    <a href="{{ route('skill.index') }}" class="nav-link">
                        <span class="sidebar-text">Skill</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
                    <a href="{{ route('pelanggan.index') }}" class="nav-link">
                        <span class="sidebar-text">Pelanggan</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="content">
        <div class="py-4">
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">@yield('heading')</h1>
                    <p class="mb-0">@yield('subheading')</p>
                </div>
                <div>@yield('actions')</div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>
</body>

</html>
