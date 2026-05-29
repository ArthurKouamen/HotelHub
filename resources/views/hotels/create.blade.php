<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un hôtel</title>
    <!--Importation du css-->
    <link rel="stylesheet" href="{{ asset('css/create-hotel.css') }}">
</head>
<body>

    <h1>Ajoutez votre hôtel</h1>

         <form action="{{route('hotels.store')}}" method="POST" enctype="multipart/form-data" class="formulaire">
    <div class="container">
        @csrf
        <div class="form-left">
            <div>
                <label>Nom :</label>
            </div>
            <input type="text" name="name" placeholder="Nom de l'hotel" required>

            <div>
                <label>Ville :</label>
            </div>
            <input type="text" name="city" placeholder="Ville" required>

            <div>
                <label>Adresse :</label>
            </div>
            <input type="text" name="address" placeholder="Adresse" required>

            <div>
                <label>Description :</label>
            </div>
            <textarea name="description" placeholder="Description" required></textarea>

            <a href="{{ route('dashboard') }}">
                <button type="button">
                    Retour
                </button>
            </a>
        </div>

        <div class="form-right">
            <div>
                <label>Image :</label>
            </div>
            <input type="file" name="image[]" multiple>
    
            <div>
                <label>numero de telephone :</label>
            </div>
            <input type="tel" name="phone">

            <div>
                <label>prix minimum de chambre :</label>
            </div>
            <input type="number" name="pixmax">

            <div>
                <label>Nombre de chambre :</label>
            </div>
            <input type="number" name="numberroom">

            <div>
                <label>nombre d'etoile :</label>
            </div>
            <input type="number" name="numberetoile">

            <div>
                <label>email:</label>
            </div>
            <input type="email" name="email">

            <button type="submit">
                Ajouter
            </button>
        </div>
      </div>   
    </form>

   

</body>
</html>