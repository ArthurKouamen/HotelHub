
@section('titre')
    HOTEL-HUB | Promotion des hôtels au Cameroun
@endsection
@section('contenu')
    <link rel="stylesheet" href="{{ asset('css/acceuil.css') }}">
    <!-- Importation d'une police moderne -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Icones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--Importation du css-->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@include('partials.header')

    <!-- Hero Section avec Barre de Recherche (Besoin III.1.1) -->
    <section class="hero">
        <div class="hero-content">
            <h1>Découvrez l'excellence hôtelière au <span class="highlight">Cameroun</span></h1>
            <p>La solution de gestion locale pour une ambition internationale. Du Nord au Sud, de l'Est à l'Ouest, trouvez l'hôtel qui vous correspond en quelques clics.</p>
            
            <div class="search-container">
                <form class="search-bar" method="GET" action="{{route ('hotel.search')}}">
            
                    <div class="input-group">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" placeholder="Ville (ex: Dschang)" name="city">
                    </div>
                       
                    <div class="input-group">
                        <i class="fas fa-money-bill-wave"></i>
                        <input type="number" placeholder="Prix min (FCFA)" name="pixmax" >
                    </div>
                        
                    <div class="input-group">
                        <i class="fas fa-hotel"></i>
                        <input type="text" placeholder="Nom de l'hôtel" name="name" >
                    </div>
                        
                    <button type="submit" class="btn-search">Rechercher</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Section Intérêts (Basé sur le Tableau I.3 du CDC) -->
<section class="features">
    <div class="container">
        <h2 class="section-title">Pourquoi nous choisir ?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="icon-wrapper">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Accès Rapide</h3>
                <p>Trouvez des informations fiables et comparez les meilleurs hôtels en un temps record.</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3>Réservation Facile</h3>
                <p>Réservez votre chambre en quelques clics, sans stress et sans déplacement physique.</p>
            </div>

            <div class="feature-card">
                <div class="icon-wrapper">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Fiabilité Garantie</h3>
                <p>Profitez de photos réelles et de tarifs mis à jour quotidiennement par les hôteliers.</p>
            </div>
        </div>
    </div>
</section>

    <!-- Section Hôtels Populaires -->
    <section class="hotels-preview">
        <div class="section-title">
            <h2>Hôtels à la une</h2>
            <p>Les établissements les plus consultés en ce moment</p>
        </div>
        
        <div class="hotel-grid">
            @foreach($featuredHotels as $hotel)
                <div class="hotel-card">
                    <div class="hotel-image" 
                        style="background-image: url('{{ $hotel->images->first() ? asset($hotel->images->first()->url) : asset('images/default-hotel.jpg') }}')">
                        <span class="price">{{ number_format($hotel->pixmax, 0, ',', '.') }} FCFA</span>
                        @if($hotel->created_at->diffInDays() < 7)
                            <span class="badge-new">Nouveau</span>
                        @endif
                    </div>
                    <div class="hotel-info">
                        <h3>{{ $hotel->name }}</h3>
                        <p><i class="fas fa-location-dot"></i> {{ $hotel->city }}, {{ Str::limit($hotel->address, 30) }}</p>
                
                        <div class="rating">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= $hotel->numberetoile ? 'fas' : 'far' }} fa-star"></i>
                            @endfor
                        </div>
                
                        <a href="{{ route('hotels.show', $hotel->id) }}" class="btn-view">Consulter</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @include('partials.footer')


