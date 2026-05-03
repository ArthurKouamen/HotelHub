<!DOCTYPE html>
<html lang="fr" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true', toggleDarkMode() { this.darkMode = !this.darkMode; localStorage.setItem('darkMode', this.darkMode); if (this.darkMode) document.documentElement.classList.add('dark'); else document.documentElement.classList.remove('dark'); } }" x-init="if (darkMode) document.documentElement.classList.add('dark')" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL-HUB | Promotion des hôtels au Cameroun</title>
    <link rel="stylesheet" href="{{ asset('css/acceuil.css') }}">
    <!-- Importation d'une police moderne -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Icones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="dark:bg-gray-900 dark:text-gray-100">

    <!-- Header & Navigation -->
    <header class="dark:bg-gray-800">
        <div class= "hamburger" id="hamburger"><i class="fa fa-bars"></i></div>
        <nav class="navbar" id="nav-menu">
            <div class="logo"><img src="images/logo.png" alt="logo du site" width= "100" height = "80"></div>
            <ul class="nav-links">
                <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Accueil</a></li>
                <li><a href="/hotels" class="{{ request()->is('hotels*') ? 'active' : '' }}">Hôtels</a></li>
                <li><a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">À propos</a></li>

                @guest
                    <li><a href="/connexion" class="btn-login"><i class="fa-solid fa-right-from-bracket"></i> Connexion</a></li>
                    <li><a href="/inscription" class="btn-signup"><i class="fa-solid fa-user-plus"></i> S'inscrire</a></li>
                @endguest

                @auth 
                    <li><a href="/dashboard" class="btn-signup"><i class="fa-solid fa-user"></i> Espace client</a></li>
                    <form action="{{ route('logout') }}" method="POST" class="form">
                        @csrf
                         <li><a href="" class="btn-login" onclick="event.preventDefault(); this.closest('form').submit();">Déconnexion <i class="fa-solid fa-right-from-bracket"></i></a></li>
                    </form>
                @endauth
            </ul>
        </nav>
    </header>