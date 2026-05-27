

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


<main class="container">
    <div class="hotels-grid"> <!-- Nouveau conteneur pour la grille -->
        @foreach($hotels as $hotel)
            <div class="hotel-card">
                <!-- Image de la carte -->
                <div class="card-image">
                    @if($hotel->images->first())
                        <img src="{{ asset($hotel->images->first()->url) }}" alt="{{ $hotel->name }}">
                    @else
                        <img src="{{ asset('assets/img/default-hotel.jpg') }}" alt="Image par défaut">
                    @endif
                    <div class="price-badge">A partir de {{ $hotel->pixmax }} XAF <span>/ nuit</span></div>
                </div>

                <!-- Contenu de la carte -->
                <div class="card-content">
                    <h3>{{ $hotel->name }}</h3>
                    <p class="location"><i class="fas fa-home"></i> {{ $hotel->city }}</p>
                    <p class="location"><i class="fas fa-map-marker-alt"></i> {{ $hotel->address }}</p>
                
                    <hr>

                    <h3>Description</h3>
                    <p class="description">{{ $hotel->description }}</p>

                    <div class="amenities">
                        <span><i class="fas fa-wifi"></i> Wifi</span>
                        <span><i class="fas fa-swimmer"></i> Piscine</span>
                    </div>
            

                    <aside class="booking-card">
                    <div class="price-tag">
                        <span class="amount">{{ $hotel->price }}€</span> / nuit
                    </div>
                @endforeach
            </div>
              
            </aside>
        </section>
    </main>

</body>
</html>
@include('partials.footer')
