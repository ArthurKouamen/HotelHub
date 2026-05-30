<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une chambre</title>
    <!--Importation du css-->
    <link rel="stylesheet" href="{{ asset('css/create-chambre.css') }}">
</head>
<body>
     @if($errors -> any())
                @foreach($errors -> all() as $error)
                <p> "{{$error}}" :</p>
                 @endforeach
        @endif

    <h1>Ajoutez votre Chambre</h1>

         <form action="{{route('room.store')}}" method="POST" enctype="multipart/form-data" class="formulaire">
    <div class="container">
        @csrf
        <div class="form-left">

            <div>
                <label>Numéro :</label>
            </div>
            <input type="text" name="number" placeholder="Numéro de chambre" required>

            <div>
                <label>Type :</label>
            </div>
            <input type="text" name="type" placeholder="Simple, double ou suite" required>

            <div>
                <label> description :</label>
            </div>
            <textarea name="discription" placeholder="mini description" required></textarea>

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
                <label>prix de la chambre :</label>
            </div>
            <input type="number" name="price">

            <div>
                <label>Capacité :</label>
            </div>
            <input type="number" name="capacity">

             <div>
                <label>hotel :</label> 
            </div>
            <div>
                <label for="hotel_id">Choisir l'hôtel :</label>
                <select name="hotel_id" id="hotel_id" class ="s1" size="4"required>
        
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}" >{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">
                Ajouter
            </button>
        </div>
      </div>   
    </form>

   

</body>
</html>