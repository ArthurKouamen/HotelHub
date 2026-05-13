<!DOCTYPE html>
<html>

<head>
    <title>hotelhub</title>
    <meta charset="utf-8">
</head>

<body>
    <h2>Liste des chambres</h2>
    <table>
        <tr>
            <th>Type</th>
            <th>Prix/Nuit</th>
            <th>Statut</th>
        </tr>
        @foreach ($hotel->chambres as $chambre)
        @endforeach
        <tr>
            <td>{{ $chambre->type }}</td>
            <td>{{ $chambre->prix }}FCFA</td>
            <>
                @if ($chambre->statut == 'disponible')
                    <span style="color:white; background-color:green;padding:5px; border-radius:5px">
                         Disponible
                    </span>
                @else
                    <span style="color:white; background-color:red;padding:5px; border-radius:5px">
                        Occupée
                    </span>

                @endif

        </tr>
    </table>
</body>

</html>
