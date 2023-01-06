<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users </title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>List des données</h1>
        
        <table id="customers">
          <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Durée</th>
          </tr>
          @foreach ($preparationBrief as $value)
                    <tr>
                        <td>{{ $value->Nom_du_brief }}</td>
                        <td>{{ $value->Description }}</td>
                        <td>{{ $value->Duree }}</td>
                    </tr>
          @endforeach
        </table>
</body>
</html>