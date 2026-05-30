
@section('titre')
    Détails de l'hôtel {{ $hotel->name }}
@endsection
    @section('contenu')
        <link rel="stylesheet" href="{{ asset('css/acceuil.css') }}">
        <!-- Importation d'une police moderne -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <!-- Icones -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <!--Importation du css-->
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/show-hotel.css') }}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endsection
    @include('partials.header')

    
<header class="mini-nav">
    <a href="{{ url('/hotels') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Retour</a>
</header>

<main class="show-container">
    <!-- 1. EN-TÊTE : PROFIL ET STATS -->
    <section class="hotel-header">
        <div class="profile-card">
            <div class="profile-main">
                <!-- Image du propriétaire ou logo hôtel -->
                <div class="profile-img-wrapper">
                    <img src="{{ asset($hotel->images->first()->url ?? 'assets/img/default.jpg') }}" alt="Hotel">
                    @if($hotel->created_at->diffInDays() < 7)
                        <span class="badge-new">Nouveau</span>
                    @endif
                    <span class="verified-badge"><i class="fas fa-check"></i></span>
                </div>
                <div class="profile-info">
                    <p class="status">Hôtel vérifié</p>
                    <h1>{{ $hotel->name }}</h1>
                    <p class="location"><i class="fas fa-map-marker-alt"></i> {{ $hotel->city }}, {{ $hotel->address }}</p>
                    <div class="rating">
                        <i class="fas fa-star"></i> <strong>4,9</strong> <span>(128 avis)</span>
                    </div>
                </div>
            </div>
            <div class="profile-description">
                <h3>À propos de cet hôte</h3>
                <p>{{ $hotel->description }}</p>
            </div>
        </div>

        <!-- Grille de stats à droite -->
        <div class="stats-grid">
            <div class="stat-item">
                <i class="fas fa-bed"></i>
                <div class="stat-val">{{ $hotel->numberroom }}</div>
                <div class="stat-label">Chambres</div>
            </div>
            <div class="stat-item">
                <i class="fas fa-users"></i>
                <div class="stat-val">156</div>
                <div class="stat-label">Voyageurs accueillis</div>
            </div>
            <div class="stat-item">
                <i class="fas fa-star"></i>
                <div class="stat-val">4,9</div>
                <div class="stat-label">Note moyenne</div>
            </div>
            <div class="stat-item">
                <i class="fas fa-comment-dots"></i>
                <div class="stat-val">100%</div>
                <div class="stat-label">Taux de réponse</div>
            </div>
        </div>
    </section>

    <!-- 2. GALERIE D'IMAGES -->
    <section class="gallery-section">
        <div class="section-header">
            <h2>Toutes les images ({{ $hotel->images->count() }})</h2>
            <a href="{{ route('hotels.images', $hotel->id) }}" class="view-all">Voir toutes les images</a>
        </div>
        <div class="image-grid">
            @foreach($hotel->images->take(5) as $image)
                <div class="grid-img">
                    <a href="{{ asset($image->url) }}" target="_blank">
                        <img src="{{ asset($image->url) }}" alt="Gallery image">
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- 3. LISTE DES CHAMBRES (Cartes horizontales) -->
    <section class="rooms-section">
        <h2>Toutes les chambres de l'hôte ({{ $chambre->count() ?? 0 }})</h2>
        
        <div class="rooms-list">
            @foreach($chambre  as $chambres)
            <div class="room-horizontal-card">
                <div class="room-img">
                
                    <img src="{{ asset($chambres->images ->url->first ?? 'assets/img/room.jpg') }}" alt="Chambre">
                </div>
                <div class="room-details">
                    <h3>{{ $chambres->name ?? 'Chambre Cosy' }}</h3>
                    <div class="room-icons">
                        <span><i class="fas fa-users"></i> {{$chambres -> capacity}} voyageurs</span>
                        <span><i class="fas fa-bed"></i> 1 lit double</span>
                        <span><i class="fas fa-bath"></i> 1 salle de bain</span>
                    </div>
                    <p class="room-desc">{{ str::limit($chambres -> description, 100)}}.</p>
                </div>
                <div class="room-price-action">
                    <div class="price"><strong>{{ $chambre->price }} €</strong> / nuit</div>
                    <a href="#" class="btn-primary">Voir les détails</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</main>

@include('partials.footer')