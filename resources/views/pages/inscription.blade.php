<!--Site de promotion d'hotel et de gestion des reservations de chambres-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

    <div class="signup-container">
        <div class="signup-card">
            <div class="header">
                <h2>Créer un compte</h2>
                <p>Rejoignez notre communauté dès aujourd'hui</p>
            </div>
            
            <form class="signup-form">
                <div class="input-group">
                    <i class="fa fa-user"></i> <!--Classe utilisée par la biblithèque font-awesone-->
                    <input type="text" placeholder="Nom complet" required>
                </div>

                <div class="input-group">
                    <i class="fa fa-envelope"></i>
                    <input type="email" placeholder="Adresse e-mail" required>
                </div>

                <div class="input-group">
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Mot de passe" required>
                </div>

                
                <div class="input-group">
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Confirmer le mot de passe" required>
                </div>

                <button type="submit" class="btn-signup">S'inscrire</button>
            </form>

            <div class="footer">
                <p>Déjà inscrit ? <a href="/connexion">Connectez-vous</a></p>
            </div>
        </div>
    </div>

</body>
</html>