    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <footer class="main-footer">
        <!-- Section des liens (Colonnes) -->
        <div class="footer-columns">
            <!-- Colonne 1 : À propos -->
            <div class="column">
                <h4 class="footer-logo">HOTEL-<span>HUB</span></h4>
                <p class="about-text">
                    La plateforme leader pour la promotion et la gestion hôtelière au Cameroun. Trouvez l'hôtel idéal en quelques clics.
                </p>
            </div>
            <!-- Colonne 2 : Navigation -->
            <div class="column">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Accueil</a></li>
                    <li><a href="{{ url('/hotels') }}" class="{{ request()->is('hotels*') ? 'active' : '' }}">Explorer les hôtels</a></li>
                    <li><a href="#">Hôtels à Dschang</a></li>
                    <li><a href="#">Promotions</a></li>
                    <li><a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">Mon Compte</a></li>
                </ul>
            </div>
            <div class="column">
                <h4>Assistance</h4>
                <ul>
                    <li><a href="#">Gérez vos voyages</a></li>
                    <li><a href="#">Contacter le Service Clients</a></li>
                    <li><a href="#">Centre des ressources en matière de sécurité</a></li>
                </ul>
            </div>
            <div class="column">
                <h4>À découvrir</h4>
                <ul>
                    <li><a href="#">Programme de fidélité Genius</a></li>
                    <li><a href="#">Offres de voyage saisonnières</a></li>
                    <li><a href="#">Articles de voyages</a></li>
                    <li><a href="#">Booking.com Business</a></li>
                    <li><a href="#">Traveller Review Awards</a></li>
                    <li><a href="#">Location de voitures</a></li>
                </ul>
            </div>
            <div class="column">
                <h4>Conditions et paramètres</h4>
                <ul>
                    <li><a href="#">Charte de confidentialité</a></li>
                    <li><a href="#">Conditions de Service</a></li>
                    <li><a href="#">Déclaration d’accessibilité</a></li>
                    <li><a href="#">Réclamation partenaires</a></li>
                    <li><a href="#">Charte relative à l'esclavage moderne</a></li>
                </ul>
            </div>
            <div class="column">
                <h4>Partenaires</h4>
                <ul>
                    <li><a href="#">Accéder à l'extranet</a></li>
                    <li><a href="#">Aide aux partenaires</a></li>
                    <li><a href="#">Ajouter mon établissement</a></li>
                    <li><a href="#">Devenir affilié</a></li>
                </ul>
            </div>
            <div class="column">
                <h4>À propos</h4>
                <ul>
                    <li><a href="#">À propos de Hotel-Hub</a></li>
                    <li><a href="#">Le fonctionnement de notre site</a></li>
                    <li><a href="#">Durabilité</a></li>
                    <li><a href="#">Centre de presse</a></li>
                    <li><a href="#">Recrutement</a></li>
                    <li><a href="#">Contacts de l'entreprise</a></li>
                </ul>
            </div>
        </div>

        <!-- Section Sélecteur de langue/Devise -->
        <div class="footer-settings">
            <div class="currency">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/4f/Flag_of_Cameroon.svg" alt="Drapeau Cameroun" width="20">
                <span>XAF</span>
            </div>
        </div>

        <!-- réseaux sociaux -->
        <div class="footer-social">
            <a href="#" class="social-facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-linkedin"><i class="fab fa-linkedin-in"></i></a>
        </div>

        <!-- Copyright et Mentions -->
        <div class="footer-copyright">
            <p>Hotel-Hub est votre plateforme idéale, leader dans la promotion hotélière au Cameroun.</p>
            <p>Copyright © 2026 Hotel-Hub™. Tous droits réservés.</p>
        </div>

        <!-- Logos Partenaires (Simulation) -->
        <div class="footer-partners">
            <span class="partner-logo">HOTEL-HUB</span>
            <span class="partner-logo">DSCHANG-TECH</span>
            <span class="partner-logo">CAMER-PROMO</span>
        </div>
    </footer>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>