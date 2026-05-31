
<link rel="stylesheet" href="{{ asset('css/acceuil.css') }}">
<!-- Importation d'une police moderne -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<!-- Icones -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!--Importation du css-->
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="admin-wrapper">
    <!-- BARRE LATÉRALE -->
    <aside class="admin-sidebar">
        <div class="sidebar-header">
            <img src="{{url('images/logo.png')}}" alt="Logo" class="logo">
        </div>
        <nav class="sidebar-nav">
            <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"><i class="fas fa-chart-line"></i> Dashboard</a>
            <a href="/admin/gestion-hotel" class="{{ request()->is('admin/gestion-hotel') ? 'active' : '' }}"><i class="fas fa-hotel"></i> Gérer les Hôtels</a>
            <a href="{{ route('admin.gestion-chambre') }}" class="{{ request()->is('admin/gestion-chambre') ? 'active' : '' }}"><i class="fas fa-bed"></i> Gérer les Chambres</a>
            <a href="#" ><i class="fas fa-users" ></i> Utilisateurs</a>
            <a href="#"><i class="fas fa-cog"></i> Paramètres</a>
            <a href="{{ route('profile.edit') }}"><i class="fas fa-user"></i> Profil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-item logout"><i class="fa-solid fa-right-from-bracket"></i> <span>Déconnexion</span></a>
            </form>
        </nav>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="admin-main">
        @if(session('success'))
            <p style ="color:green;"> session('success')</p>
        @endif
        <header class="admin-topbar">
            <h2>Tableau de bord</h2>
            <div class="admin-profile">
                <span>Administrateur</span>
                <div class="avatar-small">{{ Auth::user()->name}}</div>
            </div>
        </header>

        <!-- CARTES DE STATISTIQUES (Statiques) -->
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon blue"><i class="fas fa-hotel"></i></div>
                <div class="stat-info">
                    <h4>Hôtels</h4>
                    <p>{{$nbHotels}}</p> <!-- Chiffre statique -->
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-bed"></i></div>
                <div class="stat-info">
                    <h4>Chambres</h4>
                    <p> {{$nbChambres}} </p> <!-- Chiffre statique -->
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon orange"><i class="fas fa-users"></i></div>
                <div class="stat-info">
                    <h4>Utilisateurs</h4>
                    <p> {{$nbUser}} </p> <!-- Chiffre statique -->
                </div>
            </div>
        </section>

        <!-- TABLEAU DES HÔTELS (Statique) -->
        <section class="admin-table-section">
            <div class="section-header">
                <h3>Chambres récentes</h3>
                <a href="/room/create">
                    <button class="btn-add">+ Ajouter une chambre</button>
                </a>
            </div>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Ville</th>
                        <th>Status</th>
                        <th>type</th>
                        <th>Capacité</th>
                        <th>price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chambres as $hotel)
                    <tr>
                        <td><strong> {{$hotel ->number}} </strong></td>
                        <td>{{$hotel ->hotels ->name ?? "pas de valeur"}}</td>
                        <td><span class="badge-status">{{$hotel ->status}}</span></td>
                        <td><span class="badge-status">{{$hotel ->type}}</span></td>
                        <td><span class="badge-status">{{$hotel ->capacity}}</span></td>
                        <td><span class="badge-status">{{$hotel ->price}}</span></td>
                        <td>
                            <div class="action-btns">
                                <a href="{{route ('hotels.edit',['id' => $hotel ->id])}}" alt ="pas trouve"><button class="btn-icon edit"><i class="fas fa-edit"></i></button></a>
                                <a href="{{route ('hotels.delete', ['id' => $hotel ->id])}}" alt ="pas trouve"> <button class="btn-icon delete"><i class="fas fa-trash"></i></button></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
</div>
