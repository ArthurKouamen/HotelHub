
@section('titre')
    Détails de la chambre {{ $chambres->name }}
@endsection
    
        <link rel="stylesheet" href="{{ asset('css/acceuil.css') }}">
        <!-- Importation d'une police moderne -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <!-- Icones -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <!--Importation du css-->
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/show-chambre.css') }}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    @include('partials.header')

<main class="room-page">
    <!-- Fil d'Ariane (Breadcrumbs) -->
    <nav class="breadcrumb">
        <a href="/">Accueil</a> <i class="fas fa-chevron-right"></i>
        <a href="/hotels">Hôtels</a> <i class="fas fa-chevron-right"></i>
        <a href="{{ route('hotels.show', $chambres->id) }}">{{ $chambres->hotels->name }}</a> <i class="fas fa-chevron-right"></i>
        <span>{{ $chambres->title }}</span>
    </nav>

    <!-- GALERIE DE LA CHAMBRE -->
    <section class="room-gallery">
        <div class="main-photo">
            <img src="{{ asset($chambres->images -> first() -> url ?? 'images/room-default.jpg') }}" alt="Chambre">
        </div>
        <div class="side-photos">
            <!-- Simulé avec les images de l'hôtel ou de la chambre -->
            @foreach($chambres->images as $img)
                <div class="photo-item"><img src="{{ asset($img->url) }}"></div>
            @endforeach
            <div class="photo-item more-photos">
                <span>{{$chambres-> images -> count()}}</span>
            </div>
        </div>
    </section>

    <div class="room-content-layout">
        <!-- COLONNE GAUCHE (Infos) -->
        <div class="room-main-info">
            <div class="room-header">
                <h1>{{ $chambres->title }}</h1>
                <p class="location"><i class="fas fa-map-marker-alt"></i> {{ $chambres->hotels->city }}, Cameroun</p>
                <div class="rating-info">
                    <i class="fas fa-star"></i> <strong>4,9</strong> <span>(128 avis)</span>
                </div>
            </div>

            <!-- Caractéristiques rapides -->
            <div class="quick-specs">
                <span><i class="fas fa-users"></i> {{ $chambres->capacity }} voyageurs</span>
                <span><i class="fas fa-bed"></i>  1 lit double</span>
                <span><i class="fas fa-bath"></i> 1 salle de bain</span>
                <span><i class="fas fa-expand"></i> 25 m²</span>
            </div>

            <hr>

            <!-- Description -->
            <section class="description">
                <h3>À propos de cette chambre</h3>
                <p>{{ $chambres->description }}</p>
            </section>

            <!-- Équipements -->
            <section class="amenities-section">
                <h3>Équipements</h3>
                <div class="amenities-grid">
                    <div class="amenity"><i class="fas fa-wifi"></i> Wi-Fi rapide</div>
                    <div class="amenity"><i class="fas fa-snowflake"></i> Climatisation</div>
                    <div class="amenity"><i class="fas fa-tv"></i> TV écran plat</div>
                    <div class="amenity"><i class="fas fa-coffee"></i> Café & thé</div>
                    <div class="amenity"><i class="fas fa-parking"></i> Parking gratuit</div>
                    <div class="amenity"><i class="fas fa-shining"></i> Service de ménage</div>
                </div>
            </section>

            <!-- Infos sur l'hôte -->
            <section class="host-info">
                <h3>À propos de l'hôte</h3>
                <div class="host-card">
                    <img src="{{ asset('') }}" alt="Hôte">
                    <div>
                        <h4>{{ $chambres->hotels->name }} <i class="fas fa-check-circle verified"></i></h4>
                        <p>Membre depuis mai 2024</p>
                    </div>
                </div>
            </section>
        </div>

        <!-- COLONNE DROITE (Réservation) -->
        <aside class="booking-sidebar">
            <div class="booking-sticky-card">
                <div class="price-header">
                    <span class="price"><strong>{{ number_format($chambres->price, 0, ',', '.') }} FCFA</strong> / nuit</span>
                </div>

                <div>
                    <button type="submit" class="btn-reserve">Réserver</button>
                </div>

                
                <p class="secure-info"><i class="fas fa-shield-alt"></i> Paiement sécurisé</p>
            </div>
        </aside>
    </div>
</main>