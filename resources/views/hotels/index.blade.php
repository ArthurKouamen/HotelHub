

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
    <header class="mini-nav">
        <a href="{{ url('/') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Retour</a>
    </header>

    <main class="container">
        <section class="gallery">

            <div class="side-imgs">
                <div style="background-image: url('{{ asset('assets/img/spa.jpg') }}');"></div>
                <div style="background-image: url('{{ asset('assets/img/room.jpg') }}');"></div>
            </div>
        </section>

        <section class="hotel-layout">
            <div class="info-column">
                @foreach($hotels as $hotel)
                    <!-- Image dynamique -->
                    @if($hotel->images->first())
                        <div class="main-img" style="background-image: url('{{ asset($hotel->images->first()->url) }}')"></div>
                    @endif
                    <h1>{{ $hotel->name }}</h1>
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
                <form action="{{ route('hotels.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                    
                    <label>Dates</label>
                    <input type="date" name="checkin" required>
                    <input type="date" name="checkout" required>

                    <button type="submit" class="btn-book">Réserver cet hôtel</button>
                </form>
            </aside>
        </section>
    </main>

</body>
</html>
@include('partials.footer')