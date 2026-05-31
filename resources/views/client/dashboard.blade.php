
@section('titre')
    Mon Tableau de bord
@endsection
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
                    <span class="number">{{$reservations->count() ?? 0}}</span>
                    <span class="label">reservées</span>
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
                <a href="">Voir tout</a>
            </div>
             @if($reservations->count())
             @foreach($reservations as $reservation)
            <div class="booking-card">
                <div class="hotel-preview">
                    <img src="{{asset($reservation ->chambres -> images ->first()->url)}}" alt="Hotel">
                </div>
                
                <div class="booking-details">
                    <div class="hotel-name">
                        <h3>{{$reservations ->chambres -> number}}t</h3>
                        <span class="status-badge confirmed">Confirmé</span>
                    </div>
                    <p class="location"><i class="fa-solid fa-location-dot"></i> {{$reservations->chambres->discription}} </p>
                    <div class="date-price">
                        <div class="info-group">
                            <span class="info-label">Dates</span>
                            <span class="info-value"> {{$reservations-> arrival_date}} - {{$reservations->departure_date}}</span>
                        </div>
                        <div class="info-group">
                            <span class="info-label">Prix</span>
                            <span class="info-value"> {{$reservations->chambres->price}}</span>
                        </div>
                    </div>
                </div>
                <div class="booking-actions">
                    <button class="btn-manage">Gérer</button>
                    <button class="btn-ticket"><i class="fa-solid fa-ticket"></i></button>
                </div>
            </div>
            @endforeach
         @endif
        </section>
    </main>
</div>

@include('partials.footer')