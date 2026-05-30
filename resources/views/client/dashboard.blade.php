
@section('titre')
    Mon Tableau de bord
@endsection
    @section('contenu')
        <link rel="stylesheet" href="{{ asset('css/acceuil.css') }}">
        <!-- Importation d'une police moderne -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <!-- Icones -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <!--Importation du css-->
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard-client.css') }}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endsection
    @include('partials.header')

<div class="dashboard-container">
    <!-- BARRE LATÉRALE (SIDEBAR) -->
    <aside class="sidebar">
        <div class="logo">
            <span class="logo-icon">H</span>
            <span class="logo-text">Hotel<span>Hub</span></span>
        </div>
        <nav class="nav-menu">
            <a href="/dashboard" class="nav-item active"><i class="fa-solid fa-house"></i> <span>Tableau de bord</span></a>
            <a href="#" class="nav-item"><i class="fa-solid fa-calendar-days"></i> <span>Mes Réservations</span></a>
            <a href="#" class="nav-item"><i class="fa-solid fa-heart"></i> <span>Mes Favoris</span></a>
            <a href="{{ route('profile.edit') }}" class="nav-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}" class="nav-item"><i class="fa-solid fa-user"></i> <span>Mon Profil</span></a>
            <div class="nav-divider"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-item logout"><i class="fa-solid fa-right-from-bracket"></i> <span>Déconnexion</span></a>
            </form>
        </nav>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="main-content">
        <!-- BARRE DU HAUT -->
        <header class="top-bar">
            <div class="welcome-text">
                <h1>Bonjour, {{Auth::user()->name}} 👋</h1>
                <p>Prêt pour votre prochain voyage au Cameroun ?</p>
            </div>
            <div class="user-actions">
                <button class="notif-btn"><i class="fa-solid fa-bell"></i><span class="dot"></span></button>
                <div class="user-avatar">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=5e17eb&color=fff" alt="User">
                </div>
            </div>
        </header>

        <!-- CARTES DE STATISTIQUES -->
        <section class="stats-grid">
            <div class="stat-card">
                <div class="icon-box purple"><i class="fa-solid fa-suitcase-rolling"></i></div>
                <div class="stat-data">
                    <span class="number">12</span>
                    <span class="label">Séjours terminés</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="icon-box green"><i class="fa-solid fa-clock-rotate-left"></i></div>
                <div class="stat-data">
                    <span class="number">02</span>
                    <span class="label">En attente</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="icon-box orange"><i class="fa-solid fa-star"></i></div>
                <div class="stat-data">
                    <span class="number">4.8</span>
                    <span class="label">Ma note voyageur</span>
                </div>
            </div>
        </section>

        <!-- RÉSERVATIONS EN COURS -->
        <section class="recent-bookings">
            <div class="section-header">
                <h2>Séjours à venir</h2>
                <a href="#">Voir tout</a>
            </div>

            <div class="booking-card">
                <div class="hotel-preview">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=300&q=80" alt="Hotel">
                </div>
                <div class="booking-details">
                    <div class="hotel-name">
                        <h3>Tagidor Garden Resort</h3>
                        <span class="status-badge confirmed">Confirmé</span>
                    </div>
                    <p class="location"><i class="fa-solid fa-location-dot"></i> Bangou, Ouest Cameroun</p>
                    <div class="date-price">
                        <div class="info-group">
                            <span class="info-label">Dates</span>
                            <span class="info-value">12 Juin - 15 Juin 2024</span>
                        </div>
                        <div class="info-group">
                            <span class="info-label">Prix Total</span>
                            <span class="info-value">150.000 FCFA</span>
                        </div>
                    </div>
                </div>
                <div class="booking-actions">
                    <button class="btn-manage">Gérer</button>
                    <button class="btn-ticket"><i class="fa-solid fa-ticket"></i></button>
                </div>
            </div>
        </section>
    </main>
</div>

@include('partials.footer')