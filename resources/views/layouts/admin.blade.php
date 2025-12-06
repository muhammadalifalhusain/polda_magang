<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f8f9fa; }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #39312f;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            color: white;
        }
        .sidebar a {
            color: #ffbe76;
            padding: 12px 20px;
            display: block;
            font-size: 1rem;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,0.1);
        }
        .content {
            margin-left: 260px;
            padding: 25px;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h4 class="text-center mb-4">Admin Panel</h4>
    <a href="{{ route('logout') }}">🚪 Logout</a>
</div>

<div class="content">
    @yield('content')
</div>

</body>
</html>
