<!DOCTYPE html>
<html lang="fr">
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
</head>
<body>

    <!-- Header & Navigation -->
    <header>
        <div class= "hamburger" id="hamburger"><i class="fa fa-bars"></i></div>
        <nav class="navbar" id="nav-menu">
            <div class="logo"><img src="images/logo.png" alt="logo du site" width= "100" height = "70"></div>
            <ul class="nav-links">
                <li><a href="#" class="active">Accueil</a></li>
                <li><a href="#">Hôtels</a></li>
                <li><a href="#">À propos</a></li>
                <li><a href="/connexion" class="btn-login">Connexion</a></li>
                <li><a href="/inscription" class="btn-signup">S'inscrire</a></li>
            </ul>
        </nav>
    </header>