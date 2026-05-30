

    @section('titre')
        Les chambres de l'hotel {{$hotel->name}}
    @endsection
    @section('contenu')
        <link rel="stylesheet" href="{{ asset('css/acceuil.css') }}">
        <!-- Importation d'une police moderne -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <!-- Icones -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <!--Importation du css-->
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/chambre.css') }}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endsection
    @include('partials.header')


<body>
    <header class="mini-nav">
        <a href="{{ url('/') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Retour</a>
    </header>

<main class="container">
    <!-- Section de présentation optionnelle (Spa/Room) -->
    <section class="gallery">
        <div class="side-imgs">
            <div style="background-image: url('{{ asset('assets/img/spa.jpg') }}');"></div>
            <div style="background-image: url('{{ asset('assets/img/room.jpg') }}');"></div>
        </div>
    </section>

    <!-- GRILLE D'HOTELS -->
    <section class="hotels-grid">
        @if($hotels->count() > 0)
            @foreach($hotels as $hotel)
                <div class="hotel-card">
                    <!-- Image et Badge de prix -->
                    <div class="card-image">
                        @if($hotel->images->first())
                            <a href="{{ route('hotels.show', $hotel->id) }}">
                                <img src="{{ asset($hotel->images->first()->url) }}" alt="{{ $hotel->name }}">
                            </a>
                        @else
                            <a href="{{ route('hotels.show', $hotel->id) }}">
                                <img src="{{ asset('assets/img/default-hotel.jpg') }}" alt="Image par défaut">
                            </a>
                        @endif
                        <div class="price-badge">À partir de {{ number_format($hotel->pixmax, 0, ',', '.') }} XAF <span>/ nuit</span></div>
                    </div>

                    <!-- Contenu de la carte -->
                    <div class="card-body">
                        <div class="card-header">
                            <h3>{{ $hotel->name }}</h3>
                            <div class="locations">
                                <p><i class="fas fa-city"></i> {{ $hotel->city }}</p>
                                <p><i class="fas fa-map-marker-alt"></i> {{ $hotel->address }}</p>
                                <div class="star">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="{{ $i <= $hotel->numberetoile ? 'fas' : 'far' }} fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="card-description">
                            <h4>Description</h4>
                            <p>{{ Str::limit($hotel->description, 100) }}</p>
                        </div>

                        <div class="amenities">
                            <span><i class="fas fa-wifi"></i> Wifi</span>
                            <span><i class="fas fa-swimmer"></i> Piscine</span>
                        </div>

                        <!-- Bouton d'action -->
                        <div class="card-footer">
                            <a href="{{ route('hotels.show', $hotel->id) }}" class="btn-detail">Voir les détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="no-result">
                <p><i class="fas fa-search"></i> Aucun résultat</p>
            </div>
        @endif
    </section>
</main>

</body>
</html>
@include('partials.footer')
