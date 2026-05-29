

    @section('titre')
        A propos de nous
    @endsection
    @section('contenu')
    <link rel="stylesheet" href="{{ asset('css/acceuil.css') }}">
    <!-- Importation d'une police moderne -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Icones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--Importation du css-->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endsection
    @include('partials.header')

<body>

    <section class="about">
        <div class="overlay"></div>

        <div class="about-container">
            <div class="about-text">
                <span class="tag">Bienvenue sur HotelHub</span>

                <h1>
                    Votre plateforme moderne de
                    <span>gestion hôtelière</span>
                </h1>

                <p>
                    HotelHub est une solution innovante permettant de gérer
                    facilement les réservations, les chambres, les clients
                    et les services hôteliers dans une interface moderne,
                    rapide et intuitive.
                </p>

                <p>
                    Notre objectif est de simplifier la gestion des hôtels
                    grâce à des outils performants adaptés aux besoins
                    des établissements modernes.
                </p>

                <div class="buttons">
                    <a href="#" class="btn-primary">Découvrir</a>
                    <a href="mailto:hotelhub@gmail.com" class="btn-secondary">Nous contacter</a>
                </div>
            </div>

            <div class="about-card">
                <div class="card">
                    <h2>+500</h2>
                    <p>Réservations gérées</p>
                </div>

                <div class="card">
                    <h2>24/7</h2>
                    <p>Disponibilité du service</p>
                </div>

                <div class="card">
                    <h2>100%</h2>
                    <p>Sécurité des données</p>
                </div>
            </div>
        </div>
    </section>

@include('partials.footer')