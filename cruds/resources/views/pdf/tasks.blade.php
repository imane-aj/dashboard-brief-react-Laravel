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
            <th>Durée</th>
          </tr>
          @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->Nom_tache }}</td>
                        <td>{{ $task->Duree }}</td>
                    </tr>
          @endforeach
        </table>
</body>
</html>