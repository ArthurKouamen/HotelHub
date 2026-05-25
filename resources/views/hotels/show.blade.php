@include('partials.header')

   <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $hotel->name }} - Détails</title>
    <!-- Chargement du CSS depuis public/assets/css/ -->
    <link rel="stylesheet" href="{{ asset('assets/css/hotel.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <header class="mini-nav">
        <a href="{{ url('/') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Retour</a>
    </header>

    <main class="container">
        <section class="gallery">
            <!-- Image dynamique -->
            <div class="main-img" style="background-image: url('{{ asset('assets/img/' . $hotel->image) }}');"></div>
            <div class="side-imgs">
                <div style="background-image: url('{{ asset('assets/img/spa.jpg') }}');"></div>
                <div style="background-image: url('{{ asset('assets/img/room.jpg') }}');"></div>
            </div>
        </section>

        <section class="hotel-layout">
            <div class="info-column">
                <h1>{{ $hotel->name }}</h1>
                <p class="location"><i class="fas fa-map-marker-alt"></i> {{ $hotel->location }}</p>
                
                <hr>

                <h3>Description</h3>
                <p class="description">{{ $hotel->description }}</p>

                <div class="amenities">
                    <span><i class="fas fa-wifi"></i> Wifi</span>
                    <span><i class="fas fa-swimmer"></i> Piscine</span>
                </div>
            </div>

            <aside class="booking-card">
                <div class="price-tag">
                    <span class="amount">{{ $hotel->price }}€</span> / nuit
                </div>
                
                <form action="{{ route('booking.store') }}" method="POST">
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