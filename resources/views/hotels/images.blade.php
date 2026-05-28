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
    <link rel="stylesheet" href="{{ asset('css/images-hotel.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@include('partials.header')


<div class="container gallery-all">
    <div class="gallery-header">
        <a href="{{ route('hotels.show', $hotel->id) }}" class="back-btn">
            <i class="fas fa-chevron-left"></i> Retour à l'hôtel
        </a>
        <h1>Photos de {{ $hotel->name }}</h1>
    </div>

    <div class="full-images-grid">
        @foreach($hotel->images as $image)
            <div class="gallery-item">
                <a href="{{ asset($image->url) }}" target="_blank">
                    <img src="{{ asset($image->url) }}" alt="Image de {{ $hotel->name }}">
                </a>
            </div>
        @endforeach
    </div>
</div>
