<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une chambre</title>
    <!--Importation du css-->
    <link rel="stylesheet" href="{{ asset('css/create-chambre.css') }}">
</head>
<body>

    <h1>Ajoutez votre Chambre</h1>

         <form action="{{route('hotels.store')}}" method="POST" enctype="multipart/form-data" class="formulaire">
    <div class="container">
        @csrf
        <div class="form-left">
            <div>
                <label>Nom :</label>
            </div>
            <input type="text" name="name" placeholder="Nom de la chambre" required>

            <div>
                <label>Numéro :</label>
            </div>
            <input type="text" name="city" placeholder="Numéro de chambre" required>

            <div>
                <label>Type :</label>
            </div>
            <input type="text" name="address" placeholder="Simple, double ou suite" required>

            <div>
                <label>Courte description :</label>
            </div>
            <textarea name="description" placeholder="mini description" required></textarea>

            <a href="{{ route('dashboard') }}">
                <button type="button">
                    Retour
                </button>
            </a>
        </div>

        <div class="form-right">
            <div>
                <label>Images :</label>
            </div>
            <input type="file" name="image[]" multiple>
    
            <div>
                <label>A propos de la chambre :</label>
            </div>
            <textarea name="description" placeholder="Description plus détaillée" required></textarea>

            <div>
                <label>prix de la chambre :</label>
            </div>
            <input type="number" name="pixmax">

            <div>
                <label>Capacité :</label>
            </div>
            <input type="number" name="capacity">

            <button type="submit">
                Ajouter
            </button>
        </div>
      </div>   
    </form>

   

</body>
</html>