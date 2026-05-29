@include('partials.header')

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des hôtels</title>
    <!-- Chargement du CSS depuis public/assets/css/ -->
    <link rel="stylesheet" href="{{ asset('assets/css/hotel.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <header class="mini-nav">
        <a href="{{ url('/') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Retour</a>
    </header>

    <main class="container">
        @if ($hotels->isEmpty())
            <section class="hotel-list-empty">
                <h1>Aucun hôtel trouvé</h1>
                <p>Vérifiez si des hôtels ont bien été ajoutés dans la base de données.</p>
            </section>
        @else
            @foreach ($hotels as $hotel)
                <section class="hotel-layout">
                    <section class="gallery">
                        <div class="main-img"
                            style="background-image: url('{{ asset('assets/img/' . $hotel->image) }}');"></div>
                        <div class="side-imgs">
                            <div style="background-image: url('{{ asset('assets/img/spa.jpg') }}');"></div>
                            <div style="background-image: url('{{ asset('assets/img/room.jpg') }}');"></div>
                        </div>
                    </section>

                    <div class="info-column">
                        <h1>{{ $hotel->name }}</h1>
                        <p class="location"><i class="fas fa-map-marker-alt"></i> {{ $hotel->city }}</p>

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
            @endforeach
        @endif
    </main>
</body>

</html>
