<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa Panel</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-bg: #473d3a;
            --accent-color: #ff5821;
            --sidebar-width: 280px;
        }

        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--primary-bg);
            position: fixed;
            top: 0;
            left: 0;
            color: white;
            padding: 0;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar .brand {
            text-align: center;
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.15);
        }

        .sidebar img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            margin-bottom: 15px;
            filter: brightness(0) invert(1);
        }

        .brand h5 {
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
            letter-spacing: 0.5px;
        }

        .brand p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.85rem;
            margin: 0;
        }

        .sidebar-menu {
            flex: 1;
            padding: 20px 0;
            overflow-y: auto;
        }

        .menu-title {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 25px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .menu-item a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            border-radius: 8px;
            margin: 3px 15px;
            transition: 0.25s;
            font-weight: 500;
        }

        .menu-item a i {
            font-size: 1.1rem;
            margin-right: 12px;
            color: var(--accent-color);
        }

        .menu-item a:hover {
            background: rgba(255, 255, 255, 0.05);
            color: white;
            transform: translateX(5px);
        }

        .menu-item a.active {
            background: rgba(255, 88, 33, 0.1);
            border-left: 3px solid var(--accent-color);
            color: white;
        }

        /* Logout area */
        .logout-area {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.1);
        }

        .logout-btn {
            background: rgba(220, 53, 69, 0.9);
            border-radius: 8px;
            padding: 12px;
            text-align: center;
            font-weight: 600;
            color: white;
            display: block;
            transition: 0.3s;
            text-decoration: none;
        }

        .logout-btn:hover {
            background: rgb(220, 53, 69);
            transform: translateY(-2px);
        }

        /* ================= MAIN CONTENT ================= */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            width: 100%;
            background: white;
            padding: 18px 30px;
            border-bottom: 1px solid #eaeaea;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
            z-index: 100;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f8f9fa;
            padding: 8px 15px;
            border-radius: 50px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff5821, #ff8a5c);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .page-content {
            padding: 30px;
        }
    </style>
</head>

<body>

<!-- ================= SIDEBAR ================= -->
<div class="sidebar">

    <div class="brand">
        <img src="{{ asset('assets/img/logo-polda.png') }}" alt="">
        <h5>Mahasiswa Panel</h5>
        <p>Sistem Informasi</p>
    </div>

    <div class="sidebar-menu">

        <div class="menu-title">Menu Utama</div>
        <div class="menu-item">
            <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </div>

        <div class="menu-title">Akun & Data</div>
        <div class="menu-item">
            <a href="#">
                <i class="bi bi-person"></i> Profil
            </a>
            <a href="pengajuan">
                <i class="bi bi-journal-text"></i> Pengajuan
            </a>
            <a href="#">
                <i class="bi bi-file-earmark-text"></i> Dokumen
            </a>
        </div>

    </div>

    <div class="logout-area">
        <a href="#" class="logout-btn"
           onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
           <i class="bi bi-box-arrow-right"></i> Logout
        </a>

        <form id="logoutForm" method="POST" action="{{ route('logout') }}" class="d-none">
            @csrf
        </form>
    </div>
</div>


<!-- ================= MAIN CONTENT ================= -->
<div class="main-content">

    <!-- TOPBAR -->
    <div class="topbar">
        <h4 class="m-0 fw-bold">Mahasiswa Area</h4>

        <div class="user-profile">
            <div class="user-avatar">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>

            <div>
                <div class="fw-semibold">{{ auth()->user()->name }}</div>
                <div class="text-muted" style="font-size: 0.8rem;">Mahasiswa</div>
            </div>
        </div>
    </div>

    <div class="page-content">
        @yield('content')
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
