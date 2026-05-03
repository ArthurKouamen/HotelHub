@include('partials.header')

    <!-- Hero Section avec Barre de Recherche (Besoin III.1.1) -->
    <section class="hero">
        <div class="hero-content">
            <h1>Découvrez l'excellence hôtelière au <span class="highlight">Cameroun</span></h1>
            <p>La solution de gestion locale pour une ambition internationale. Du Nord au Sud, de l'Est à l'Ouest, trouvez l'hôtel qui vous correspond en quelques clics.</p>
            
            <div class="search-container">
                <form class="search-bar">
                    <div class="input-group">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" placeholder="Ville (ex: Dschang)">
                    </div>
                    <div class="input-group">
                        <i class="fas fa-money-bill-wave"></i>
                        <input type="number" placeholder="Prix max (FCFA)">
                    </div>
                    <div class="input-group">
                        <i class="fas fa-hotel"></i>
                        <input type="text" placeholder="Nom de l'hôtel">
                    </div>
                    <button type="submit" class="btn-search">Rechercher</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Section Intérêts (Basé sur le Tableau I.3 du CDC) -->
    <section class="features">
        <div class="container">
            <div class="feature-card">
                <i class="fas fa-bolt"></i>
                <h3>Accès Rapide</h3>
                <p>Trouvez des informations fiables en un temps record.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-calendar-check"></i>
                <h3>Réservation Facile</h3>
                <p>Réservez votre chambre en ligne sans déplacement physique.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Fiabilité</h3>
                <p>Des photos et des prix mis à jour par les hôteliers.</p>
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
            <!-- Hôtel 1 -->
            <div class="hotel-card">
                <div class="hotel-image" style="background-image: url('images/Adys-hotel-Dschang.jpg')">
                    <span class="price">25.000 FCFA</span>
                </div>
                <div class="hotel-info">
                    <h3>Hôtel Adys</h3>
                    <p><i class="fas fa-location-dot"></i> Dschang, Entrée Campus A</p>
                    <div class="rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn-view">Consulter</a>
                </div>
            </div>

            <!-- Hôtel 2 -->
            <div class="hotel-card">
                <div class="hotel-image" style="background-image: url('images/constellation-hotel-Dschang.jpg')">
                    <span class="price">45.000 FCFA</span>
                </div>
                <div class="hotel-info">
                    <h3>Constellation Hotel</h3>
                    <p><i class="fas fa-location-dot"></i> Dschang, Quartier Administratif</p>
                    <div class="rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <a href="#" class="btn-view">Consulter</a>
                </div>
            </div>

            <!-- Hôtel 3 -->
            <div class="hotel-card">
                <div class="hotel-image" style="background-image: url('images/Hotel_Du_Lac_Dschang-Dschang-Cameroon01_large.webp')">
                    <span class="price">15.000 FCFA</span>
                </div>
                <div class="hotel-info">
                    <h3>La voie Lactée Dschang</h3>
                    <p><i class="fas fa-location-dot"></i> Dschang, derrière le musée de la civilisation</p>
                    <div class="rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                    </div>
                    <a href="#" class="btn-view">Consulter</a>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')


