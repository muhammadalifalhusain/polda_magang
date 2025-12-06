<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

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

        .sidebar-menu .menu-section {
            padding: 0 0 10px 0;
            margin-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .sidebar-menu .menu-title {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 25px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .sidebar-menu .menu-item {
            padding: 0 15px;
        }

        .sidebar-menu a, .sidebar-menu .menu-btn {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            border: none;
            background: transparent;
            width: 100%;
            text-align: left;
            border-radius: 8px;
            margin: 3px 0;
            transition: all 0.25s ease;
            font-weight: 500;
        }

        .sidebar-menu a i, .sidebar-menu .menu-btn i {
            width: 24px;
            font-size: 1.1rem;
            margin-right: 12px;
            color: var(--accent-color);
        }

        .sidebar-menu a:hover, .sidebar-menu .menu-btn:hover {
            background: rgba(255, 255, 255, 0.05);
            color: white;
            transform: translateX(5px);
        }

        .sidebar-menu a.active {
            background: rgba(255, 88, 33, 0.1);
            color: white;
            border-left: 3px solid var(--accent-color);
        }

        .sidebar-menu a.active i {
            color: var(--accent-color);
        }

        /* Logout Area */
        .logout-area {
            margin-top: auto;
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.1);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.9);
            background: rgba(220, 53, 69, 0.9);
            border: none;
            padding: 12px 20px;
            width: 100%;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .logout-btn:hover {
            background: rgba(220, 53, 69, 1);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }

        .logout-btn i {
            font-size: 1.2rem;
            margin-right: 10px;
        }

        /* ================= MAIN CONTENT ================= */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ================= TOP NAVBAR ================= */
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

        .topbar-left {
            display: flex;
            align-items: center;
        }

        .topbar-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #333;
            margin: 0;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 15px;
            background: #f8f9fa;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .user-profile:hover {
            background: #f0f2f5;
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
            font-size: 0.9rem;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            color: #333;
            font-size: 0.95rem;
        }

        .user-role {
            font-size: 0.8rem;
            color: #6c757d;
        }

        /* ================= PAGE CONTENT ================= */
        .page-content {
            flex: 1;
            padding: 30px;
            background: #f8f9fa;
        }

        .content-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            margin-bottom: 25px;
        }

        .content-card h3 {
            color: #333;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f0f0;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .topbar-title {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>

<!-- ================= SIDEBAR ================= -->
<div class="sidebar">

    <!-- LOGO DAN BRAND -->
    <div class="brand">
        <img src="{{ asset('assets/img/logo-polda.png') }}" 
            alt="Logo" 
            style="width: 120px; height: auto;">
        
        <h5 class="mt-2">Admin Panel</h5>
        <p>Management System</p>
    </div>


    <!-- MENU -->
    <div class="sidebar-menu">
        
        <div class="menu-section">
            <div class="menu-title">Main Menu</div>
            <div class="menu-item">
                <a href="{{ route('admin.dashboard') }}" class="active">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </div>
        </div>

        <div class="menu-section">
            <div class="menu-title">Management</div>
            <div class="menu-item">
                <a href="#">
                    <i class="bi bi-file-text"></i> Manajemen Pengajuan
                </a>
                
                <a href="#">
                    <i class="bi bi-people"></i> Data Pengguna
                </a>
                
                <a href="#">
                    <i class="bi bi-bar-chart"></i> Reports
                </a>
                
                <a href="#">
                    <i class="bi bi-gear"></i> Settings
                </a>
            </div>
        </div>

        <div class="menu-section">
            <div class="menu-title">Support</div>
            <div class="menu-item">
                <a href="#">
                    <i class="bi bi-question-circle"></i> Help Center
                </a>
                
                <a href="#">
                    <i class="bi bi-info-circle"></i> Documentation
                </a>
            </div>
        </div>

    </div>

    <!-- LOGOUT AREA -->
    <div class="logout-area">
        <a href="#" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
        
        <form id="logoutForm" method="POST" action="{{ route('logout') }}" class="d-none">
            @csrf
        </form>
    </div>
</div>

<!-- ================= MAIN CONTENT ================= -->
<div class="main-content">
    <!-- ================= TOP NAVBAR ================= -->
    <div class="topbar">

        <!-- Bagian Kiri -->
        <div class="topbar-left">
            <h4 class="topbar-title"></h4>
        </div>

        <!-- Bagian Kanan -->
        <div class="topbar-right">
            <div class="user-profile">
                <div class="user-avatar">
                    {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                </div>
                <div class="user-info">
                    <span class="user-name">{{ Auth::user()->name ?? 'Administrator' }}</span>
                    <span class="user-role">{{ Auth::user()->role ?? 'Admin' }}</span>
                </div>
            </div>
        </div>

    </div>
    
    <!-- ================= PAGE CONTENT ================= -->
    <div class="page-content">
        @yield('content')
    </div>
</div>

<!-- ================= JAVASCRIPT ================= -->
<!-- Bootstrap 5 JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Admin panel loaded successfully');
        
        // Sidebar toggle untuk mobile
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('.sidebar');
        
        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
        }
        
        // Konfirmasi logout
        const logoutBtn = document.querySelector('.logout-btn');
        if (logoutBtn) {
            logoutBtn.addEventListener('click', function(e) {
                if (!confirm('Apakah Anda yakin ingin logout?')) {
                    e.preventDefault();
                }
            });
        }
        
        // Inisialisasi tooltip Bootstrap
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

</body>
</html>