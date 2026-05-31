<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Réservation</title>
        <link rel="stylesheet" href="{{ asset('assets/css/reservation.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <form action="{{ route('reservations.store') }}" method="POST" class="reservation-form">
            @csrf
            <label for="arrival_date">Date d'arrivé </label>
            <input type="date" id="arrival_date" name="arrival_date" required="required">
            <label for="departure_date">Date de depart </label>
            <input type="date" id="departure_date" name="departure_date" required="required">
            <label for="payement">Mode de payement</label>
            <input type="checkbox" name="payement" id="payement" value="Orange Money" required="required">
            <input type="checkbox" name="payement" id="payement" value="MOMO" required="required">
            <input type="submit" id="valider" value="valide">
            <input type="reset" id="annuler" value="annuler">
        </form>
    </body>
</html>
