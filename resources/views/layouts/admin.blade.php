<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="admin-wrapper">
        <!-- LA SIDEBAR (Elle reste toujours ici) -->
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <h3>HOTEL-HUB <span style="color: #26b1a5;">ADMIN</span></h3>
            </div>
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i> <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.hotels.index') }}" class="{{ request()->routeIs('admin.hotels.*') ? 'active' : '' }}">
                    <i class="fas fa-hotel"></i> <span>Gérer les Hôtels</span>
                </a>
                <!-- Autres liens... -->
            </nav>
        </aside>

        <!-- ZONE DE DROITE (C'est ici que le contenu change) -->
        <main class="admin-main">
            @yield('admin-content')
        </main>
    </div>
</body>
</html>