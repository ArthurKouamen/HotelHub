<!DOCTYPE HTML>
<HMTL>
    <head>
        <title>Reservation</title>
        <meta charset="utf-8">

    </HEAD>
    <body>
        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST" class="reservation-form">
            @csrf
            @method('PUT')
            <label for="arrival_date">Date d'arrivé </label>
            <input type="date" id="arrival_date" name="arrival_date" value="{{ $reservation->arrival_date }}" required="required">
            <label for="departure_date">Date de depart </label>
            <input type="date" id="departure_date" name="departure_date" value="{{ $reservation->departure_date }}" required="required">
            <button type="submit">Update Reservation</button>
        </form>
</HMTL>
