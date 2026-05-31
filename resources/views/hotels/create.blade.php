<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un hôtel</title>
    <!--Importation du css-->
    <link rel="stylesheet" href="{{ asset('css/create-hotel.css') }}">
</head>
<body>
     @if($errors -> any())
                @foreach($errors -> all() as $error)
                <p> "{{$error}}" :</p>
                 @endforeach
        @endif

    <h1>Ajoutez votre hôtel</h1>
    @if($hotels)
        <form action="{{route('hotels.update')}}" method="POST" enctype="multipart/form-data" class="formulaire">
    <div class="container">
    @else
         <form action="{{route('hotels.store')}}" method="POST" enctype="multipart/form-data" class="formulaire">
    <div class="container">
    @endif
        @csrf
        
        <div class="form-left">
            <div>
                <label>Nom :</label>
            </div>
            <input type="text" name="name" placeholder="Nom de l'hotel" required value = "{{old('name',$hotels->name ??'')}}">

            <div>
                <label>Ville :</label>
            </div>
            <input type="text" name="city" placeholder="Ville" required value = "{{old('city',$hotels->city ??'')}}">

            <div>
                <label>Adresse :</label>
            </div>
            <input type="text" name="address" placeholder="Adresse" required value = "{{old('address',$hotels->address ??'')}}">

            <div>
                <label>Description :</label>
            </div>
            <textarea name="description" placeholder="Description" required value ="{{old ('description', $hotels->description ??'')}} "></textarea>

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
            <input type="file" name="image[]" multiple >
    
            <div>
                <label>numero de telephone :</label>
            </div>
            <input type="tel" name="phone" value = "{{old ('phone',$hotels->phone ??'')}}">

            <div>
                <label>prix minimum de chambre :</label>
            </div>
            <input type="number" name="pixmax" value = "{{ old ('pixmax', $hotels->pixmax ??'')}}">

            <div>
                <label>nombre d'etoile :</label>
            </div>
            <input type="number" name="numberetoile" value = "{{ old('numberetoile' , $hotels->numberetoile ??'')}}">

            <div>
                <label>email:</label>
            </div>
            <input type="email" name="email" value = "{{ old ('email', $hotels->email ??'')}}">
            <button type="submit">
                Ajouter
            </button>
        </div>
      </div>   
    </form>

   

</body>
</html>