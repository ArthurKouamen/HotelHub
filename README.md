# HotelHub

# 🏨 Système de Promotion Hôtelière

Application web permettant aux utilisateurs de rechercher et réserver des chambres d’hôtel en ligne au Cameroun.

## 🎯 Objectif

Ce projet a pour objectif de digitaliser la gestion des hôtels au Cameroun en facilitant :
- La consultation et la réservation de chambres en ligne pour les clients.
- La gestion des hôtels et des chambres pour les administrateurs.
- L'administration des utilisateurs de la plateforme.

## ✨ Fonctionnalités du MVP (Minimum Viable Product)

Le développement du projet sera découpé en plusieurs sprints, visant à livrer progressivement les fonctionnalités clés :

### Sprint 1: Initialisation et Base de Données
*   Mettre en place l'environnement de développement.
*   Concevoir et implémenter la structure de la base de données pour les entités principales (`Utilisateur`, `Hôtel`, `Chambre`).
*   Mettre en place les bases de l'authentification (inscription, connexion).

### Sprint 2: Navigation et Affichage des Hôtels
*   Permettre aux utilisateurs de parcourir les hôtels et voir leurs détails de base (nom, adresse, ville, description, image).
*   Afficher les chambres disponibles pour un hôtel donné (type, prix, statut).

### Sprint 3: Gestion des Hôtels et Chambres (Admin)
*   Permettre à l'administrateur de gérer les hôtels (ajouter, modifier, supprimer).
*   Permettre à l'administrateur de gérer les chambres (ajouter, modifier, supprimer) pour chaque hôtel.

### Sprint 4: Recherche et Filtrage
*   Permettre aux utilisateurs de rechercher des hôtels par ville ou par nom.
*   Permettre aux utilisateurs de filtrer les résultats de recherche par prix.

### Sprint 5: Processus de Réservation
*   Permettre aux utilisateurs connectés de sélectionner une chambre et saisir les dates d'arrivée et de départ.
*   Implémenter la confirmation de réservation avec les règles métier (disponibilité, dates valides).
*   Envoyer une confirmation de réservation.

### Sprint 6: Gestion des Réservations et Commentaires
*   Permettre aux utilisateurs connectés de consulter et annuler leurs réservations.
*   Permettre aux utilisateurs de laisser des commentaires et des notes sur les hôtels.
*   Permettre aux administrateurs de consulter toutes les réservations et les commentaires.

---

## ⚙️ Technologies Utilisées

-   **Frontend** : HTML, CSS, JavaScript
-   **Backend** : Laravel
-   **Base de données** : MySQL (géré via phpMyAdmin)
-   **Serveur de développement local** : Apache (intégré dans Laragon)

## 👥 Équipe et Rôles

-   **Arthur** : [À compléter avec le rôle spécifique d'Arthur]
-   **Merveille** : [À compléter avec le rôle spécifique de Merveille]
-   **Ange** : [À compléter avec le rôle spécifique d'Ange]
-   **Kabrel** : [À compléter avec le rôle spécifique de Kabrel]

## 🚀 Installation du Projet

### 1. Prérequis

Avant de commencer, assurez-vous d’avoir installé les outils suivants sur votre machine :
*   **Git** : Pour le clonage du dépôt. Téléchargez-le depuis [https://git-scm.com/](https://git-scm.com/).
*   **Laragon** : Un environnement de développement local complet (Apache, MySQL, PHP, Composer). Téléchargez-le depuis [https://laragon.org/](https://laragon.org/).
*   **Composer** : Un gestionnaire de dépendances pour PHP. Laragon l'installe généralement, mais vérifiez sa présence ou téléchargez-le depuis [https://getcomposer.org/](https://getcomposer.org/).

### 2. Étapes d'Installation

1.  **Cloner le projet** :
    ```bash
    git clone https://github.com/HotelHub.git
    ```

2.  **Accéder au dossier du projet** :
    ```bash
    cd HotelHub
    ```

3.  **Installer les dépendances Composer** :
    ```bash
    composer install
    ```

4.  **Configurer le fichier `.env`** :
    *   Copiez le fichier `.env.example` et renommez-le en `.env`.
    *   Modifiez les paramètres de connexion à la base de données (si nécessaire, Laragon configure souvent par défaut `DB_DATABASE=homestead`, `DB_USERNAME=root`, `DB_PASSWORD=` ou laissez vide).
    *   Générez une clé d'application Laravel :
        ```bash
        php artisan key:generate
        ```

5.  **Lancer les migrations et les seeders** :
    ```bash
    php artisan migrate --seed
    ```
    (Ceci créera les tables de la base de données et les remplira avec des données de test si des seeders sont définis.)

6.  **Lancer le serveur de développement Laragon** :
    *   Démarrez Laragon (Apache et MySQL).
    *   Depuis le terminal du projet, vous pouvez lancer le serveur Laravel :
        ```bash
        php artisan serve
        ```
    *   Accédez ensuite à l'application via l'URL fournie par Laravel (généralement `http://127.0.0.1:8000`).

### 3. Workflow de Contribution Git

1.  **Mettre à jour le projet (avant de commencer à travailler)** :
    ```bash
    git pull origin main
    ```

2.  **Créer une branche pour votre fonctionnalité (TRÈS IMPORTANT)** :
    Ne travaillez **jamais** directement sur la branche `main`.
    ```bash
    git checkout -b nom-de-ta-branche
    ```
    (Exemple : `git checkout -b feature/login-page` ou `git checkout -b fix/bug-reservation`)

3.  **Ajouter et enregistrer vos modifications** :
    ```bash
    git add .
    git commit -m "Description concise de vos modifications"
    ```
    (Exemple : `git commit -m "Ajout de la page de connexion et gestion du formulaire"`)

4.  **Envoyer votre travail sur GitHub** :
    ```bash
    git push origin nom-de-ta-branche
    ```

5.  **Créer une Pull Request (PR)** :
    *   Accédez au dépôt GitHub de votre projet dans votre navigateur web.
    *   Vous verrez probablement une notification pour créer une Pull Request depuis votre nouvelle branche.
    *   Cliquez sur **`Compare & pull request`**.
    *   Ajoutez un titre clair et une description détaillée de votre Pull Request.
    *   Cliquez sur **`Create pull request`**.

6.  **Après validation de la Pull Request** :
    Une fois que votre Pull Request a été examinée et fusionnée avec succès dans la branche `main` :
    ```bash
    git checkout main          # Revenez à la branche principale
    git pull origin main       # Synchronisez votre branche principale locale avec celle du dépôt
    git branch -d nom-de-ta-branche # Supprimez votre branche locale de fonctionnalité (optionnel mais recommandé)
    ```

## 🗂️ Structure du Projet

-   `/app` : Logique métier (Modèles, Contrôleurs, etc.)
-   `/database` : Migrations, seeders, factories.
-   `/public` : Fichiers accessibles publiquement (CSS, JS, images).
-   `/resources` : Vues Blade, assets frontend (SCSS, JS).
-   `/routes` : Définition des routes de l'application.
-   `/tests` : Tests unitaires et fonctionnels.

## 📌 Contribution

-   Chaque nouvelle fonctionnalité ou correction de bug doit être développée sur une **branche dédiée**.
-   Ne jamais pousser directement sur la branche `main`.
-   Toutes les modifications doivent passer par une **Pull Request** pour revue et validation.

🗂️📄 Documentation

-docs/cahier-de-charges-v1


## 📄 Licence

Ce projet est un projet académique destiné à des fins éducatives et ne dispose pas d'une licence open-source formelle pour l'instant.

