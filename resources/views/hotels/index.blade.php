

    @section('titre')
        Nos Hotels
    @endsection
    @section('contenu')
        <link rel="stylesheet" href="{{ asset('css/acceuil.css') }}">
        <!-- Importation d'une police moderne -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <!-- Icones -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <!--Importation du css-->
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/hotel.css') }}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endsection
    @include('partials.header')


<body>


<main class="container">
    <div class="page-header">
        <h1>Tous nos hôtels au Cameroun</h1>
        <p>Découvrez plus de {{ $hotels->count() }} établissements vérifiés</p>
    </div>

    <!-- GRILLE DE TOUS LES HOTELS -->
    <div class="hotel-grid">
        @foreach($hotels as $hotel)
            <div class="hotel-card">
                <a href="{{ route('hotels.show', $hotel->id) }}">
                    <div class="hotel-image" 
                         style="background-image: url('{{ $hotel->images->first() ? asset($hotel->images->first()->url) : asset('images/default-hotel.jpg') }}')">
                         @if($hotel->created_at->diffInDays() < 7)
                            <span class="badge-new">Nouveau</span>
                        @endif
                        <span class="price">A partir de {{ number_format($hotel->pixmax, 0, ',', '.') }} FCFA / nuit</span>
                    </div>
                </a>
                <div class="hotel-info">
                    <h3>{{ $hotel->name }}</h3>
                    <p><i class="fas fa-location-dot"></i> {{ $hotel->city }}</p>
                    
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

    <!-- PAGINATION (Les boutons Suivant/Précédent) -->
    <div class="pagination-container">
        {{ $hotels->links() }}
    </div>
</main>


@include('partials.footer')
