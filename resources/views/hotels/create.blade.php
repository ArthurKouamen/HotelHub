<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un hôtel</title>
    <!--Importation du css-->
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>

    <h1>Ajoutez votre hôtel</h1>

    <div class="container">
         <form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data" class="formulaire">

        @csrf

        <div>
            <label>Nom :</label>
        </div>
        <input type="text" name="name" placeholder="Nom de l'hotel" required>

        <br>

        <div>
            <label>Ville :</label>
        </div>
        <input type="text" name="city" placeholder="Ville" required>

        <br>

        <div>
            <label>Adresse :</label>
        </div>
        <input type="text" name="adresse" placeholder="Adresse" required>

        <br>

        <div>
            <label>Description :</label>
        </div>
        <textarea name="description" placeholder="Description" required></textarea>

        <br>

        <div>
            <label>Image :</label>
        </div>
        <input type="file" name="image[]" multiple>
        <br>

        <div>
            <label>adresse :</label>
        </div>
        <input type="text" name="address">

        <br>

        <div>
            <label>numero de telephone :</label>
        </div>
        <input type="tel" name="phone">
        <br>

        <div>
            <label>prix maximal :</label>
        </div>
        <input type="number" name="pixmax">
        <br>

        <div>
            <label>nombre d'etoile :</label>
        </div>
        <input type="number" name="numberetoile">
        <br>

        <div>
            <label>email:</label>
        </div>
        <input type="email" name="email">
        <br>


        <button type="submit">
            Ajouter
        </button>

    </form>
    </div>

   

</body>
</html>