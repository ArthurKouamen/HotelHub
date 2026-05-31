<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Faites votre reservation</title>
    <!--Importation du css-->
    <link rel="stylesheet" href="{{ asset('css/create-hotel.css') }}">
</head>
<body>
     @if(session('success'))
        <p style ="color:green;"> {{session('success')}} </p>
    @endif
     @if($errors -> any())
            @foreach($errors -> all() as $error)
                <p> "{{$error}}" :</p>
            @endforeach
        @endif

    <h1>Faites votre reservation</h1>
    @if(isset($chambres))
        <form action="{{route('reservation.update', ['id' => $chambres ->id])}}" method="POST" enctype="multipart/form-data" class="formulaire">
    <div class="container">
    @else
         <form action="{{route('reservation.edit', ['id' => $chambre_id ->id])}}" method="POST" enctype="multipart/form-data" class="formulaire">
    <div class="container">
    @endif
        @csrf
        
        <div class="form-left">
            <div>
                <label>Date d'arrivée :</label>
            </div>
            <input type="date" name="arrival_date" required value = "{{old('arrival_date',$chambres->arrival_date ??'')}}">

            <div>
                <label>Date de départ :</label>
            </div>
            <input type="date" name="departure_date" required value = "{{old('departural_date',$chambres->departural_date ??'')}}">

            <a href="{{ route('dashboard') }}">
                <button type="button">
                    Retour
                </button>
            </a>
        </div>

        <div class="form-right">
            <div>
                <input type="hidden" name="chambre_id" value="{{ $chambre_id ->id }}">
                
            </div>

            <button type="submit">
                Reserver
            </button>
        </div>
      </div>   
    </form>

   

</body>
</html>