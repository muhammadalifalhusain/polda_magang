<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-bg: #ffffff;
            --sidebar-border: #e5e5e5;
            --accent: #ff5821;
        }

        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: var(--sidebar-bg);
            border-right: 1px solid var(--sidebar-border);
            padding: 20px 0;
        }

        .sidebar .brand {
            text-align: center;
            padding: 10px 0 20px;
            border-bottom: 1px solid #eee;
        }

        .sidebar .brand img {
            width: 60px;
        }

        .menu-title {
            padding: 10px 25px 5px;
            font-size: 0.75rem;
            font-weight: 600;
            color: #999;
            text-transform: uppercase;
        }

        .menu-item a {
            display: block;
            padding: 12px 25px;
            color: #333;
            text-decoration: none;
            transition: 0.2s;
            font-weight: 500;
            border-radius: 6px;
        }

        .menu-item a i {
            margin-right: 10px;
            color: var(--accent);
        }

        .menu-item a:hover,
        .menu-item a.active {
            background: #f4f4f4;
        }

        /* MAIN */
        .main-content {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            background: white;
            padding: 15px 25px;
            border-bottom: 1px solid #eaeaea;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: var(--accent);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        .page-content {
            padding: 25px;
        }

        .logout-area {
            padding: 20px;
            border-top: 1px solid #eee;
            text-align: center;
        }

        .logout-btn {
            padding: 10px;
            background: #dc3545;
            border-radius: 8px;
            display: block;
            text-decoration: none;
            color: white;
            font-weight: 600;
        }

        .logout-btn:hover { background: #bb2d3b; }
    </style>
</head>

<body>

<div class="sidebar">
    <div class="brand">
        <img src="{{ asset('assets/img/logo-polda.png') }}">
        <h6 class="mt-2">Mahasiswa Panel</h6>
    </div>

    <div class="menu-title">Menu Utama</div>

    <div class="menu-item">
        <a href="{{ route('user.dashboard') }}"
           class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            <i class="bi bi-person-circle"></i> Profile
        </a>
    </div>

    <div class="menu-title">Akun & Data</div>

    <div class="menu-item">
        <a href="{{ route('user.pengajuan.index') }}"
           class="{{ request()->routeIs('user.pengajuan.*') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-plus"></i> Pengajuan
        </a>

        <a href="{{ route('user.status.index') }}"
           class="{{ request()->routeIs('user.status.*') ? 'active' : '' }}">
            <i class="bi bi-clock-history"></i> Status Pengajuan
        </a>

        <a href="{{ route('user.logbook.index') }}"
           class="{{ request()->routeIs('user.logbook.*') ? 'active' : '' }}">
            <i class="bi bi-journal-text"></i> LogBook
        </a>
    </div>

    <div class="logout-area">
        <a class="logout-btn" href="#"
           onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
        <form id="logoutForm" method="POST" action="{{ route('logout') }}" class="d-none">
            @csrf
        </form>
    </div>
</div>

<div class="main-content">

    <div class="topbar">
        <h5 class="m-0 fw-bold">Mahasiswa Area</h5>

        <div class="user-profile">
            <div class="user-avatar">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
            <div>
                <div class="fw-semibold">{{ auth()->user()->name }}</div>
                <small class="text-muted">Mahasiswa</small>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="page-title mb-4">
            <h4 class="fw-bold">@yield('page-title')</h4>
        </div>

        @yield('content')
    </div>

</div>

</body>
</html>
