<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un hôtel</title>
    <!--Importation du css-->
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>

    <h1>Ajouter un hôtel</h1>

    <form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div>
            <label>Nom :</label>
        </div>
        <input type="text" name="name">

        <br>

        <div>
            <label>Ville :</label>
        </div>
        <input type="text" name="city">

        <br>

        <div>
            <label>Description :</label>
        </div>
        <textarea name="description"></textarea>

        <br>

        <div>
            <label>Image :</label>
        </div>
        <input type="file" name="image">

        <br>

        <button type="submit">
            Ajouter
        </button>

    </form>

</body>
</html>