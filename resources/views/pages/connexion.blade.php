<!--Site de promotion d'hotel et de gestion des reservations de chambres-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>

    <div class="signup-container">
        <div class="signup-card">
            <div class="header">
                <h2>Se Connecter</h2>
                <p>Rejoignez notre communauté dès aujourd'hui</p>
            </div>
            
            <form class="signup-form">
                <div class="input-group">
                    <i class="fa fa-envelope"></i>  <!--Classe utilisée par la biblithèque font-awesone-->
                    <input type="email" placeholder="Adresse e-mail" required>
                </div>

                <div class="input-group">
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Mot de passe" required>
                </div>

                <button type="submit" class="btn-signup">Connexion</button>
            </form>

            <div class="footer">
                <p>Pas de compte ? <a href="/inscription">Créer un compte</a></p>
            </div>
        </div>
    </div>

</body>
</html>